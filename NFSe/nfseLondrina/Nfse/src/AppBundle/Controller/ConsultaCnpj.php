<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DomCrawler\Crawler;
use Exception;

/**
 * ConsultaCnpj controller.
 *
 */
class ConsultaCnpj extends Controller
{
    public function __construct()
    {
        $pasta_cookies = 'cookies/';
        define('COOKIELOCAL', str_replace('\\', '/', realpath('./')).'/'.$pasta_cookies);
        define('HTTPCOOKIELOCAL',$pasta_cookies);
        // inicia sessão

//        if(!isset($_SESSION)) {
//            @session_start();
//        }
        @session_start();
    }

    public function getCaptcha(){

//        $tipo_consulta = $_GET['tipo_consulta'];
        $tipo_consulta = 'cnpj';

        // define os nomes dos arquivos de cookie para cada tipo de consulta
        if($tipo_consulta == 'cpf')
        {
            // define arquivo de cookie e url da chamada curl para geração de captcha para consulta de cpf
            $cookieFile = COOKIELOCAL.'cpf_'.session_id();
            $cookieFile_fopen = HTTPCOOKIELOCAL.'cpf_'.session_id();

            $url = 'https://www.receita.fazenda.gov.br/Aplicacoes/SSL/ATCTA/CPF/captcha/gerarCaptcha.asp';	// nova URL (https) SSL para consulta CPF
        }
        else if ($tipo_consulta == 'cnpj')
        {
            // define arquivo de cookie e url da chamada curl para geração de captcha para consulta de cnpj
            $cookieFile = COOKIELOCAL.'cnpj_'.session_id();
            $cookieFile_fopen = HTTPCOOKIELOCAL.'cnpj_'.session_id();
            $url = 'http://www.receita.fazenda.gov.br/pessoajuridica/cnpj/cnpjreva/captcha/gerarCaptcha.asp';
        }
        else
        {die("faltou parâmetro tipo_consulta");}

        if(!file_exists($cookieFile))
        {
            $file = fopen($cookieFile, 'w');
            fclose($file);
        }

        // faz a chamada Curl que gera a imagem de captcha para consulta de CPF ou CNPJ conforme o parâmetro passado por get
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);	// para consulta de CPF, necessário devido SSL (https), para CNPJ este parametro não interfere na consulta
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);	// para consulta de CPF, necessário devido SSL (https), para CNPJ este parametro não interfere na consulta
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:8.0) Gecko/20100101 Firefox/8.0');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $imgsource = curl_exec($ch);
        curl_close($ch);

        // se tiver imagem , mostra
        //if(!empty($imgsource))
        //{
        //	$img = imagecreatefromstring($imgsource);
        //	header('Content-type: image/jpg');
        //	imagejpeg($img);
        //}

        // --------------- aqui abaixo hack para consulta de cnpj.-----------
        //	observei que a primeira consulta de cnpj retorna vazia , possivelmente deve ter alguma variavel de sessão que precisa ser iniciada antes , na página inicial da receita -- Cnpjreva_Solicitacao2.asp
        //	resolvi fazendo a consulta curl abaixo , ...enviando o Session name e session id que o captcha gerou para a página Cnpjreva_Solicitacao2.asp
        // isso ainda não é necessário para consulta de cpf

        if ($tipo_consulta == 'cnpj')
        {
            // pega os dados de sessão gerados na visualização do captcha dentro do cookie
            $conteudo = '';
            $file = fopen($cookieFile_fopen, 'r');
            while (!feof($file))
            {$conteudo .= fread($file, 1024);}
            fclose ($file);

            $explodir = explode(chr(9),$conteudo);

            $sessionName = trim($explodir[count($explodir)-2]);
            $sessionId = trim($explodir[count($explodir)-1]);

            // constroe o parâmetro de sessão que será passado no próximo curl
            $cookie = $sessionName.'='.$sessionId;

            $ch = curl_init('http://www.receita.fazenda.gov.br/pessoajuridica/cnpj/cnpjreva/Cnpjreva_Solicitacao2.asp');
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);	// dados do arquivo de cookie
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);	// dados do arquivo de cookie
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:8.0) Gecko/20100101 Firefox/8.0');
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $html = curl_exec($ch);
            curl_close($ch);

        }
        return array('captchaBase64' => 'data:image/png;base64,' . base64_encode($imgsource));
    }

    // função para pegar o que interessa
    function pega_o_que_interessa($inicio,$fim,$total)
    {
        $interesse = str_replace($inicio,'',str_replace(strstr(strstr($total,$inicio),$fim),'',strstr($total,$inicio)));
        return($interesse);
    }

    // função para pegar a resposta html da consulta pelo CPF na página da receita
    function getHtmlCNPJ($cnpj, $captcha)
    {
        $cnpj = str_replace(".", "", $cnpj);

        $cookieFile = COOKIELOCAL.'cnpj_'.session_id();
        $cookieFile_fopen = HTTPCOOKIELOCAL.'cnpj_'.session_id();
        if(!file_exists($cookieFile))
        {
            return false;
        }
        else
        {
            $conteudo = "";
            // pega os dados de sessão gerados na visualização do captcha dentro do cookie
            $file = fopen($cookieFile_fopen, 'r');
            while (!feof($file))
            {$conteudo .= fread($file, 1024);}
            fclose ($file);
            $explodir = explode(chr(9),$conteudo);

            $sessionName = trim($explodir[count($explodir)-2]);
            $sessionId = trim($explodir[count($explodir)-1]);
            // se não tem falg	1 no cookie então acrescenta
            if(!strstr($conteudo,'flag	1'))
            {
                // linha que deve ser inserida no cookie antes da consulta cnpj
                // observações argumentos separados por tab (chr(9)) e new line no final e inicio da linha (chr(10))
                // substitui dois chr(10) padrão do cookie para separar cabecario do conteudo , adicionando o conteudo $linha , que tb inicia com dois chr(10)
                $linha = chr(10).chr(10).'www.receita.fazenda.gov.br	FALSE	/pessoajuridica/cnpj/cnpjreva/	FALSE	0	flag	1'.chr(10);
                // novo cookie com o flag=1 dentro dele , antes da linha de sessionname e sessionid
                $novo_cookie = str_replace(chr(10).chr(10),$linha,$conteudo);

                // apaga o cookie antigo
                unlink($cookieFile);

                // cria o novo cookie , com a linha flag=1 inserida
                $file = fopen($cookieFile, 'w');
                fwrite($file, $novo_cookie);
                fclose($file);
            }

            // constroe o parâmetro de sessão que será passado no próximo curl
            $cookie = $sessionName.'='.$sessionId.';flag=1';
        }

        // dados que serão submetidos a consulta por post
        $post = array
        (
            'submit1'						=> 'Consultar',
            'origem'						=> 'comprovante',
            'cnpj' 							=> $cnpj,
            'txtTexto_captcha_serpro_gov_br'=> $captcha,
            'search_type'					=> 'cnpj'

        );

        $post = http_build_query($post, NULL, '&');
        $ch = curl_init('http://www.receita.fazenda.gov.br/pessoajuridica/cnpj/cnpjreva/valida.asp');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);		// aqui estão os campos de formulário
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);	// dados do arquivo de cookie
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);	// dados do arquivo de cookie
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:8.0) Gecko/20100101 Firefox/8.0');
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);	    // dados de sessão e flag=1
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
        curl_setopt($ch, CURLOPT_REFERER, 'http://www.receita.fazenda.gov.br/pessoajuridica/cnpj/cnpjreva/Cnpjreva_Solicitacao2.asp');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($ch);
        curl_close($ch);
        return $html;
    }

    // função para pegar a resposta html da consulta pelo CPF na página da receita
    function getHtmlCPF($cpf, $datanascim, $captcha)
    {
        $url = 'https://www.receita.fazenda.gov.br/Aplicacoes/SSL/ATCTA/CPF/ConsultaPublicaExibir.asp';	// nova URL (https) SSL para consulta CPF

        $cookieFile = COOKIELOCAL.'cpf_'.session_id();
        $cookieFile_fopen = HTTPCOOKIELOCAL.'cpf_'.session_id();
        if(!file_exists($cookieFile))
        {
            return false;
        }
        else
        {
            $conteudo = "";
            // pega os dados de sessão gerados na visualização do captcha dentro do cookie
            $file = fopen($cookieFile_fopen, 'r');
            while (!feof($file))
            {$conteudo .= fread($file, 1024);}
            fclose ($file);
            $explodir = explode(chr(9),$conteudo);

            $sessionName = trim($explodir[count($explodir)-2]);
            $sessionId = trim($explodir[count($explodir)-1]);
            // prepara a variavel de session
            $cookie = $sessionName.'='.$sessionId;
        }
        // dados que serão submetidos a consulta por post
        $post = array
        (
            'txtTexto_captcha_serpro_gov_br'		=> $captcha,
            'tempTxtCPF'							=> $cpf,
            'tempTxtNascimento'						=> $datanascim,
            'temptxtToken_captcha_serpro_gov_br'	=> '',
            'temptxtTexto_captcha_serpro_gov_br'	=> $captcha
        );
        $post = http_build_query($post, NULL, '&');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);		// aqui estão os campos de formulário
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);	// dados do arquivo de cookie
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);	// dados do arquivo de cookie
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);	// para consulta de CPF, necessário devido SSL (https), para CNPJ este parametro não interfere na consulta
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);	// para consulta de CPF, necessário devido SSL (https), para CNPJ este parametro não interfere na consulta
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:8.0) Gecko/20100101 Firefox/8.0');
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);			// continua a sessão anterior com os dados do captcha
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.receita.fazenda.gov.br/Aplicacoes/SSL/ATCTA/CPF/ConsultaPublica.asp');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($ch);
        curl_close($ch);

        return $html;
    }

    // Função para extrair o que interessa da HTML e colocar em array
    function parseHtmlCNPJ($html)
    {
        // respostas que interessam
        $campos = array(
            'NÚMERO DE INSCRIÇÃO',
            'DATA DE ABERTURA',
            'NOME EMPRESARIAL',
            'TÍTULO DO ESTABELECIMENTO (NOME DE FANTASIA)',
            'CÓDIGO E DESCRIÇÃO DA ATIVIDADE ECONÔMICA PRINCIPAL',
            'CÓDIGO E DESCRIÇÃO DAS ATIVIDADES ECONÔMICAS SECUNDÁRIAS',
            'CÓDIGO E DESCRIÇÃO DA NATUREZA JURÍDICA',
            'LOGRADOURO',
            'NÚMERO',
            'COMPLEMENTO',
            'CEP',
            'BAIRRO/DISTRITO',
            'MUNICÍPIO',
            'UF',
            'ENDEREÇO ELETRÔNICO',
            'TELEFONE',
            'ENTE FEDERATIVO RESPONSÁVEL (EFR)',
            'SITUAÇÃO CADASTRAL',
            'DATA DA SITUAÇÃO CADASTRAL',
            'MOTIVO DE SITUAÇÃO CADASTRAL',
            'SITUAÇÃO ESPECIAL',
            'DATA DA SITUAÇÃO ESPECIAL');
        // caracteres que devem ser eliminados da resposta
        $caract_especiais = array(
            chr(9),
            chr(10),
            chr(13),
            '&nbsp;',
            '</b>',
            '  ',
            '<b>MATRIZ<br>',
            '<b>FILIAL<br>'
        );
        // prepara a resposta para extrair os dados
        $html = str_replace('<br><b>','<b>',str_replace($caract_especiais,'',strip_tags($html,'<b><br>')));

        $html3 = $html;
        // faz a extração
        for($i=0;$i<count($campos);$i++)
        {
            $html2 = strstr($html,utf8_decode($campos[$i]));
            $resultado[] = trim($this->pega_o_que_interessa(utf8_decode($campos[$i]).'<b>','<br>',$html2));
            $html=$html2;
        }
        // extrai os CNAEs secundarios , quando forem mais de um
        if(strstr($resultado[5],'<b>'))
        {
            $cnae_secundarios = explode('<b>',$resultado[5]);
            $resultado[5] = $cnae_secundarios;
            unset($cnae_secundarios);
        }
        // devolve STATUS da consulta correto
        if(!$resultado[0])
        {
            if(strstr($html3,utf8_decode('O número do CNPJ não é válido')))
            {$resultado['status'] = 'CNPJ incorreto ou não existe';}
            else
            {$resultado['status'] = 'Imagem digitada incorretamente';}
        }
        else
        {$resultado['status'] = 'OK';}

        return $resultado;
    }

    // Função para extrair o que interessa da HTML e colocar em array
    function parseHtmlCPF($html)
    {
        // respostas que interessam
        $campos = array(
            'No do CPF:',
            'Nome da Pessoa Física:',
            'Data de Nascimento:',
            'Situação Cadastral:',
            'Data da Inscrição:'
        );

        // caracteres que devem ser eliminados da resposta
        $caract_especiais = array(
            chr(9),
            chr(10),
            chr(13),
            '&nbsp;',
            '  ',
        );

        // prepara a resposta para extrair os dados
        $html = str_replace('<br /><br />','<br />',str_replace($caract_especiais,'',strip_tags($html,'<b><br>')));

        // para utilizar na hora de devolver o status da consulta
        $html3 = $html;
        // faz a extração
        for($i=0;$i<count($campos);$i++)
        {
            $html2 = strstr($html,utf8_decode($campos[$i]));
            $resultado[] = trim(pega_o_que_interessa(utf8_decode($campos[$i]),'<br',$html2));
            $html=$html2;
        }

        // devolve STATUS da consulta correto
        if(!$resultado[0])
        {
            if(strstr($html3,utf8_decode('CPF incorreto')))
            {$resultado['status'] = 'CPF incorreto';}
            else if(strstr($html3,utf8_decode('não existe em nossa base de dados')))
            {$resultado['status'] = 'CPF não existe';}
            else if(strstr($html3,utf8_decode('Os caracteres da imagem não foram preenchidos corretamente')))
            {$resultado['status'] = 'Imagem digitada incorretamente';}
            else
            {$resultado['status'] = 'Receita não responde';}
        }
        else
        {$resultado['status'] = 'OK';}
        return $resultado;
    }

}
