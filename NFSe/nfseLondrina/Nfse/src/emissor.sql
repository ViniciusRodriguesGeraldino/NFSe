/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancos` (
  `EMPRESA` int(11) NOT NULL,
  `BANCO` int(11) DEFAULT NULL,
  `NUMERO` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOME` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AGENCIA` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_AGENCIA` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CC` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_CC` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARTEIRA` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAIXA_BANCO` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_BANCO` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_BANCO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `bancos` VALUES (1,1,'2','2','2','3','4','5','56','4',1);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `EMPRESA` int(11) DEFAULT NULL,
  `NOME` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENDERECO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAIRRO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COMPLEMENTO` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CIDADE` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COD_CID` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UF` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IE` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CEP` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FONE` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPFCNPJ` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RG` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `E_MAIL` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CELULAR` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATA_NASC` date DEFAULT NULL,
  `ESTADO_CIVIL` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOME_CONJUGE` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROFISSAO` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `SEXO` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RACA` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NATURALIDADE` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OBS` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_MAE` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONVENIO` int(11) DEFAULT NULL,
  `INDICACAO` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOME_TITULAR` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPF_TITULAR` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TIPO_DEPENDENTE` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CODIGO_CLIENTE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DEPENDENTE` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `cliente` VALUES (1,'Vinicius Geraldino','Rua Eliane Alvin Dias','154','Jardim Império do Sol','CASA','Londrina','4113700','PR',NULL,'86073770','(43) 3328-2608','05317864984','05317864984','vinicius@sibrax.com.br','','1991-11-21','Solteiro','','',NULL,'M',NULL,NULL,NULL,1,1,'',5,'Dr José M A A A .','','','','210a',0),(1,'Leonardo Lima','Rua Tanganica','999','Ouro Verde','','Londrina','4113700','PR',NULL,'86080000','(43) 33256-5255','05366654148',NULL,'leo@sibrax.com.br','','1980-02-01','Solteiro','','',NULL,'M',NULL,NULL,NULL,1,2,'',2,'','','','','999p',0),(1,'CS PEREIRA - MARINGA','ROD. PR-317',NULL,'',NULL,'MARINGA','4115200',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'ADECLAU IND. E COM.ART.COURO L','',NULL,'',NULL,'     -',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'MADEREIRA E DEPOSITO UNIAO','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'LUZZA & SOUZA LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'COPEL','MERCOSUL KM 464 L4 1B',NULL,'',NULL,'NOVA ESPERANCA','4116901',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'AGIP DO BRASIL LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'ICARO COMERCIO DE COUROS LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'IRMAOS MUFFATO E CIA LTDA','R.QUINTINO BOCAIUVA 1045',NULL,'',NULL,'LONDRINA','4113700',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'SEGURA & OLIVEIRA LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'UBB-BRASIL BORRACHAS LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'MAGLON COM. ATAC. DE PECAS LTD','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'SPAIPA S.A. INDéS. BRASILEIRA DE BEBIDAS','AV. SABIµ',NULL,'',NULL,'MARINGµ',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'TANTRIL BERALDIM COMERCIO LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'Quicklink Empreendimentos Ltda','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'FLEXOPRINT ETIQUETAS LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'PM FIGUEREDO LOPES LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'VIPEX TRANSPORTES LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'IND.COM.EST.MEGER LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'IND.COM.MOVEIS EST.MEGER LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'ESTILO COM E DIST. PECAS LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'ESTOFADOS DIAMOND LINE LTDA-ME','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'CALIL COMERCIAL LTDA ME','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'BRASIL TRANSPORTES INTERMODAL LTDA','RUA GALATEA,1400 VILA GUILHERME',NULL,'',NULL,'SAO PAULO','3550308',NULL,NULL,'02068060',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'VIP TRANSPORTES LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'BIKUATA-COM. DE PECAS LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'PER CASA IND.COM.MOVEIS LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'PETUNIA COM.E CONFECCOES LTDA','',NULL,'',NULL,'',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'Adriano','Rua Eliane Alvin Dias','321','Jardim Império do Sol','','Londrina','4113700','PR',NULL,'86073770','(43) 6666-5555','532.545.584-48',NULL,'adriano@xuxa.com','(44) 6666-9999',NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,31,'',0,'','','','',NULL,0),(1,'Adriano','Rua Helena Aparecida Ridão','','Gleba Jacutinga','','Londrina','4113700','PR',NULL,'86073000','(66) 5555-2222','988.898.888-77',NULL,'asdas@asdas','(11) 1111-5555','1990-11-21','','','',NULL,'',NULL,NULL,NULL,NULL,32,'',0,'','','','',NULL,0),(1,'asdasda','Rua Helena Aparecida Ridão','3232','Gleba Jacutinga','','Londrina','4113700','PR',NULL,'86073000','(65) 6555-5554','123.123.21',NULL,'asdas@asdas','(44) 4444-4444','1990-07-22','','','',NULL,'',NULL,NULL,NULL,NULL,33,'',0,'','','','',NULL,0),(1,'Adriano','','','','','','','',NULL,'','','532.545.584-48',NULL,'asdas@asdas','','1950-05-05','','','',NULL,'',NULL,NULL,NULL,NULL,34,'',0,'','','','',NULL,0),(1,'Guilherme','','','','','','','',NULL,'','','989.898',NULL,'','','2010-01-01','','','',NULL,'',NULL,NULL,NULL,NULL,35,'',0,'','','','',NULL,0),(1,'asdasdas','','','','','','','',NULL,'','','123.412.4',NULL,'','','2000-01-22','','','',NULL,'',NULL,NULL,NULL,NULL,36,'',0,'','','','',NULL,0),(1,'Osvaldo','Rua Helena Aparecida Ridão','666','Gleba Jacutinga','','Londrina','4113700','PR',NULL,'86073000','(66) 33333-3','123.456.789-99',NULL,'asdas@asdas','(42) 6666-6666','1990-11-21','','','',NULL,'',NULL,NULL,NULL,NULL,37,'',0,'','','','',NULL,0),(1,'Gui','','','','','','','',NULL,'','','112.233.333-33',NULL,'asdasd@asdas','','2000-01-01','','','',NULL,'',NULL,NULL,NULL,NULL,38,'',0,'','','','',NULL,0),(1,'asdasd','','','','','','','',NULL,'','','111.111.111-11',NULL,'asdas@asdas','','1111-11-21','','','',NULL,'',NULL,NULL,NULL,NULL,39,'',0,'','','','',NULL,0),(1,'asdasd','','','','','','','',NULL,'','','111.111.111',NULL,'asdas@asdas','','1991-11-21','','','',NULL,'',NULL,NULL,NULL,NULL,40,'',0,'','','','',NULL,0),(1,'Adriano','','','','','','','',NULL,'','','532.545.584-48',NULL,'asdas@asdas','','1111-11-11','','','',NULL,'',NULL,NULL,NULL,NULL,41,'',0,'','','','',NULL,0),(1,'Adriano Xuxa','','','','','','','',NULL,'','','532.545.584-48',NULL,'asdasad','','1131-11-11','','','',NULL,'',NULL,NULL,NULL,NULL,42,'',0,'','','','',NULL,0),(1,'Adriano','','','','','','','',NULL,'','','532.545.584-48',NULL,'asdas@asdas','','1991-11-21','','','',NULL,'',NULL,NULL,NULL,NULL,43,'',0,'','','','',NULL,0),(1,'Osvaldo Lima','Rua Helena Aparecida Ridão','321','Gleba Jacutinga','','Londrina','4113700','PR',NULL,'86073000','(43) 6666-9999','33366699988',NULL,'osvaldo@sibrax.com.br','(44) 2222-5555','1960-01-01','Casado','','Diretor',NULL,'',NULL,NULL,NULL,NULL,44,'',1,'Medico José','Teste Titular','999666999','Esposo',NULL,0),(1,'Lucas Perez','Rua Tanganica','333','Ouro Verde','','Londrina','4113700','PR',NULL,'86080000','(33) 6666-9999','88899966622',NULL,'lucas@sibrax.com.br','(44) 8888-2222','1985-11-21','','','',NULL,'M',NULL,NULL,NULL,NULL,45,'',0,'','','','','',0);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clinica_convenio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CPFCNPJ` varchar(18) DEFAULT NULL,
  `INSCRICAO_MUN` varchar(20) DEFAULT NULL,
  `INSCRICAO_EST` varchar(20) DEFAULT NULL,
  `NOME_CONVENIO` varchar(40) NOT NULL,
  `ENDERECO` varchar(40) DEFAULT NULL,
  `NUMERO` varchar(6) DEFAULT NULL,
  `COMPLEMENTO` varchar(40) DEFAULT NULL,
  `BAIRRO` varchar(40) DEFAULT NULL,
  `CIDADE` varchar(40) DEFAULT NULL,
  `COD_CID` varchar(7) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `CEP` varchar(9) DEFAULT NULL,
  `FONE` varchar(15) DEFAULT NULL,
  `E_MAIL` varchar(60) DEFAULT NULL,
  `ID_EMPRESA` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `clinica_convenio` VALUES (1,'2222222','2222222','333333333','Unimed 1','Rua Eliane Alvin Dias','666','complemento teste','Jardim Império do Sol','Londrina','4113700','PR','86073770','(43) 33336-666','teste@teste',1,1),(2,'2222222','2222222','333333333','Unimed 2','Rua Eliane Alvin Dias','666','complemento teste','Jardim Império do Sol','Londrina','4113700','PR','86073770','(43) 33336-666','teste@teste',1,1),(3,'2222222','2222222','333333333','Unimed 3','Rua Eliane Alvin Dias','666','complemento teste','Jardim Império do Sol','Londrina','4113700','PR','86073770','(43) 33336-666','teste@teste',1,1),(4,'2222222','2222222','333333333','Unimed 4','Rua Eliane Alvin Dias','666','complemento teste','Jardim Império do Sol','Londrina','4113700','PR','86073770','(43) 33336-666','teste@teste',1,1),(5,'2222222','2222222','333333333','Unimed 5','Rua Eliane Alvin Dias','666','complemento teste','Jardim Império do Sol','Londrina','4113700','PR','86073770','(43) 33336-666','teste@teste',1,1),(6,'2222222','2222222','333333333','Unimed 6','Rua Eliane Alvin Dias','666','complemento teste','Jardim Império do Sol','Londrina','4113700','PR','86073770','(43) 33336-666','teste@teste',1,1),(7,'2222222','2222222','333333333','Unimed 7','Rua Eliane Alvin Dias','666','complemento teste','Jardim Império do Sol','Londrina','4113700','PR','86073770','(43) 33336-666','teste@teste',1,1),(8,'','','','','','','','','','','','','','',1,1);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contaspagarreceber` (
  `EMPRESA` int(11) NOT NULL,
  `TIPO_CONTA` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `NOME` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_DOCUMENTO` int(11) DEFAULT NULL,
  `DATA_LANCAMENTO` date DEFAULT NULL,
  `DATA_VENCIMENTO` date DEFAULT NULL,
  `VALOR_TOTAL` double DEFAULT NULL,
  `ACRESCIMOS` double DEFAULT NULL,
  `DESCONTOS` double DEFAULT NULL,
  `CREDITO` int(11) DEFAULT NULL,
  `DEBITO` int(11) DEFAULT NULL,
  `PLANO` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HISTORICO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAGAMENTO` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `contaspagarreceber` VALUES (1,'PAGAR',1,'Vinicius Rodrigues',5656,'2016-09-20','2016-09-20',150,0,0,NULL,NULL,'10.01','Pagamento de marmitas',1,8),(1,'RECEBER',2,'',12121,'2016-09-20','2016-09-20',300,0,10,NULL,NULL,'10.04\r\n   ','Compra de Papel',2,9),(1,'PAGAR',1,'Vinicius Rodrigues',7654,'2016-09-21','2016-09-21',100,0,0,NULL,NULL,'Compra a P','Pgto. do empréstimo',2,10),(1,'RECEBER',1,'Vinicius R',999,'2016-09-23','2016-09-23',100,0,0,NULL,NULL,'10.00','Recebimento do Zézin',0,11),(1,'RECEBER',2,'Leonardo Lima',2424,'2016-09-28','2016-09-28',1000,0,0,NULL,NULL,'Venda a Vi','Tio Léo',1,12);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `NOME` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UF` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FONE` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `E_MAIL` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENDERECO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COMPLEMENTO` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAIRRO` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CIDADE` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CEP` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPFCNPJ` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAMINHO_LOGO` varchar(230) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CMC` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CNAE_PREFEITURA` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPF_PREFEITURA` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SENHA_PREFEITURA` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRODUCAO` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SIMPLES` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INICIO_ATIVIDADE` date DEFAULT NULL,
  `COD_CID` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_tipo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `empresa` VALUES ('SIBRAX SOFTWARE LTDA - EPP','PR','(43)3324-2486','vinicius@sibrax.com.br','Rua Raja Gabaglia','577','','Jardim Quebec','Londrina','86060-190','21143831000192',NULL,'2119676',NULL,'02756788902','osvaldo','N','S','1994-12-26','',1,'COMERCIO',1);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itens_conta_pagar_receber` (
  `ID_EMPRESA` int(11) NOT NULL,
  `ID_CONTA` int(11) NOT NULL,
  `VALOR` double DEFAULT NULL,
  `ACRESCIMO` double DEFAULT NULL,
  `DESCONTO` double DEFAULT NULL,
  `DATA_LANCAMENTO` date DEFAULT NULL,
  `DATA_VENCIMENTO` date DEFAULT NULL,
  `HISTORICO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `itens_conta_pagar_receber` VALUES (1,8,150,0,0,'2016-09-20','2016-09-20','Pagamento de marmitas',30),(1,9,150,0,5,'2016-09-20','2016-09-20','Compra de Papel',37),(1,9,150,0,5,'2016-09-20','2016-10-20','Compra de Papel',38),(1,10,25,0,0,'2016-09-21','2016-09-21','Pgto. do empréstimo',39),(1,10,25,0,0,'2016-09-21','2016-10-21','Pgto. do empréstimo',40),(1,10,25,0,0,'2016-09-21','2016-11-21','Pgto. do empréstimo',41),(1,10,25,0,0,'2016-09-21','2016-12-21','Pgto. do empréstimo',42),(1,11,100,0,0,'2016-09-27','2016-09-23','Recebimento do Zézin',45),(1,12,1000,0,0,'2016-09-28','2016-09-28','Tio Léo',46);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lancamentos` (
  `ID_EMPRESA` int(11) NOT NULL,
  `ID_DOC` int(11) NOT NULL,
  `NUMERO_DOC` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `VALOR` double DEFAULT NULL,
  `ACRESCIMO` double DEFAULT NULL,
  `DESCONTO` double DEFAULT NULL,
  `TIPO_LANC` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATA_LANCAMENTO` date DEFAULT NULL,
  `DATA_VENCIMENTO` date DEFAULT NULL,
  `HISTORICO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CREDITO` int(11) DEFAULT NULL,
  `DEBITO` int(11) DEFAULT NULL,
  `BANCO` int(11) DEFAULT NULL,
  `CENTRO_CUSTO` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `lancamentos` VALUES (1,41,103,1,1.02,0,0,'NFSE','2016-10-06','2016-10-06','Nota Fiscal de Serviço Eletronica No. 103',0,0,0,'',1),(1,43,104,1,1.02,0,0,'NFSE','2016-10-06','2016-10-06','Nota Fiscal de Serviço Eletronica No. 104',0,0,0,'',2),(1,49,107,1,1.02,0,0,'NFSE','2016-10-06','2016-10-06','Nota Fiscal de Serviço Eletronica No. 107',0,0,0,'',3),(1,61,108,1,1.02,0,0,'NFSE','2016-10-07','2016-10-07','Nota Fiscal de Serviço Eletronica No. 108',0,0,0,'',4);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listaservico` (
  `DESCRICAO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIQUOTA` double DEFAULT NULL,
  `CODIGO` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `listaservico` VALUES ('SERVIÇOS DE INFORMÁTICA E CONGÊNERES',0,'01.00'),('Análise e desenvolvimento de sistemas',2,'01.01'),('Programação',2,'01.02'),('Processamento de dados e congêneres',2,'01.03'),('Elaboração de programas de computadores, inclusive de jogos eletrônicos',2,'01.04'),('Licenciamento ou cessão de direito de uso de programas de computação',2,'01.05'),('Assessoria e consultoria em informática',2,'01.06'),('Suporte técnico em informática, inclusive instalação, configuração e manutenção de programas de computação e bancos de dados',2,'01.07'),('Planejamento, confecção, manutenção e atualização de páginas eletrônicas',2,'01.08'),('SERVIÇOS DE PESQUISAS E DESENVOLVIMENTO DE QUALQUER NATUREZA',5,'02.00'),('Serviços de pesquisas e desenvolvimento de qualquer natureza',5,'02.01'),('SERVIÇOS PRESTADOS MEDIANTE LOCAÇÃO, CESSÃO DE DIREITO DE USO E CONGÊNERES',5,'03.00'),('Cessão de direito de uso de marcas e de sinais de propaganda',5,'03.02'),('Exploração de salões de festas,centro de convenções,escrit. virtuais,stands,quadras esportivas,estádios,ginásios,auditórios,casas espetác.,parques diversões,canchas,congên. realiz. eventos',5,'03.03'),('Locação, sublocação, arrendamento, direito de passagem ou permissão de uso, compartilhado ou não, de ferrovia, rodovia, postes, cabos, dutos e condutos de qualquer natureza',5,'03.04'),('Cessão de andaimes, palcos, coberturas e outras estruturas de uso temporário',5,'03.05'),('SERVIÇOS DE SAÚDE, ASSISTÊNCIA MÉDICA E CONGÊNERES',0,'04.00'),('Medicina e biomedicina',3,'04.01'),('Análises clínicas, patologia, eletricidade médica, radioterapia, quimioterapia, ultra-sonografia, ressonância magnética, radiologia, tomografia e congêneres',3,'04.02'),('Hospitais, clínicas, laboratórios, sanatórios, manicômios, casas de saúde, prontos-socorros, ambulatórios e congêneres',0,'04.03'),('Instrumentação cirúrgica',3,'04.04'),('Acupuntura',3,'04.05'),('Enfermagem, inclusive serviços auxiliares',3,'04.06'),('Serviços farmacêuticos',3,'04.07'),('Terapia ocupacional, fisioterapia e fonoaudiologia',3,'04.08'),('Terapias de qualquer espécie destinadas ao tratamento físico, orgânico e mental',3,'04.09'),('Nutrição',3,'04.10'),('Obstetrícia',3,'04.11'),('Odontologia',3,'04.12'),('Ortóptica',3,'04.13'),('Próteses sob encomenda',3,'04.14'),('Psicanálise',3,'04.15'),('Psicologia',3,'04.16'),('Casas de repouso e de recuperação, creches, asilos e congêneres',3,'04.17'),('Inseminação artificial, fertilização in vitro e congêneres',3,'04.18'),('Bancos de sangue, leite, pele, olhos, óvulos, sêmen e congêneres',3,'04.19'),('Coleta de sangue, leite, tecidos, sêmen, órgãos e materiais biológicos de qualquer espécie',3,'04.20'),('Unidade de atendimento, assistência ou tratamento móvel e congêneres',3,'04.21'),('Planos de medicina de grupo ou individual e convênios para prestação de assistência médica, hospitalar, odontológica e congêneres',3,'04.22'),('Outros planos de saúde que se cumpram através de serviços de terceiros contratados, credenciados, cooperados ou apenas pagos pelo operador do plano mediante indicação do beneficiário',3,'04.23'),('LABORATÓRIOS DE ANÁLISE, INCLUÍDOS OS DE PATOLOGIA CLÍNICA',2,'040.31'),('HOSPITAIS, CLÍNICAS, LABORATÓRIOS, SANATÓRIOS, MANICÔMIOS, CASAS DE SAÚDE, PRONTOS-SOCORROS, AMBULATÓRIOS E CONGÊNERES',3,'040.32'),('SERVIÇOS DE MEDICINA E ASSISTÊNCIA VETERINÁRIA E CONGÊNERES',0,'05.00'),('Medicina veterinária e zootecnia',5,'05.01'),('Hospitais, clínicas, ambulatórios, prontos-socorros e congêneres, na área veterinária',5,'05.02'),('Laboratórios de análise na área veterinária',5,'05.03'),('Inseminação artificial, fertilização in vitro e congêneres',5,'05.04'),('Bancos de sangue e de órgãos e congêneres',5,'05.05'),('Coleta de sangue, leite, tecidos, sêmen, órgãos e materiais biológicos de qualquer espécie',5,'05.06'),('Unidade de atendimento, assistência ou tratamento móvel e congêneres',5,'05.07'),('Guarda, tratamento, amestramento, embelezamento, alojamento e congêneres',5,'05.08'),('Planos de atendimento e assistência médico-veterinária',5,'05.09'),('SERVIÇOS DE CUIDADOS PESSOAIS, ESTÉTICA, ATIVIDADES FÍSICAS E CONGÊNERES',5,'06.00'),('Barbearia, cabeleireiros, manicuros, pedicuros e congêneres',5,'06.01'),('Esteticistas, tratamento de pele, depilação e congêneres',5,'06.02'),('Banhos, duchas, sauna, massagens e congêneres',5,'06.03'),('Ginástica, dança, esportes, natação, artes marciais e demais atividades físicas',5,'06.04'),('Centros de emagrecimento, spa e congêneres',5,'06.05'),('SERVIÇOS RELATIVOS A ENGENHARIA, ARQUITETURA, GEOLOGIA, URBANISMO, CONSTRUÇÃO CIVIL, MANUTENÇÃO, LIMPEZA, MEIO AMBIENTE, SANEAMENTO E CONGÊNERES',0,'07.00'),('Engenharia,agronomia,agrimensura,arquitetura,geologia,urbanismo,paisagismo e congêneres inclusive sondagem,perfur. poços,escavação,drenagem e irrigação,terraplan.,paviment.,concretagem',4,'07.01'),('Execução,p/ admin.,empreit. ou subempreit., de obras de const. civil,hidráulica ou elétrica e outras obras semelhantes,inclusive sondagem,perfuração de poços, escavação, drenagem...)',3,'07.02'),('Elaboração de planos diretores,estudos viabilidade,estudos organizac. e outros,relac. c/ obras e serv. engenharia;elaboração anteprojetos,proj. básicos e projetos execut. p/ trabalhos engenh.',3,'07.03'),('Demolição',3,'07.04'),('Reparação,conservação e ref. edifícios,estradas,pontes,portos e congên.(exc. o fornec. mercadorias produzidas pelo prestador serviços,fora do local da prest. serviços,que fica sujeito a ICMS)',3,'07.05'),('Colocação e instalação de tapetes, carpetes, assoalhos, cortinas, revestimentos de parede, vidros, divisórias, placas de gesso e congêneres, com material fornecido pelo tomador do serviço',5,'07.06'),('Recuperação, raspagem, polimento e lustração de pisos e congêneres',5,'07.07'),('Medicina veterinária e zootecnia',5,'07.08'),('Varrição, coleta, remoção, incineração, tratamento, reciclagem, separação e destinação final de lixo, rejeitos e outros resíduos quaisquer',5,'07.09'),('Limpeza, manutenção e conservação de vias e logradouros públicos, imóveis, chaminés, piscinas, parques, jardins e congêneres',5,'07.10'),('Decoração e jardinagem, inclusive corte e poda de árvores',5,'07.11'),('Controle e tratamento de efluentes de qualquer natureza e de agentes físicos, químicos e biológicos',5,'07.12'),('Dedetização, desinfecção, desinsetização, imunização, higienização, desratização, pulverização e congêneres',5,'07.13'),('Florestamento, reflorestamento, semeadura, adubação e congêneres',5,'07.16'),('Escoramento, contenção de encostas e serviços congêneres',4,'07.17'),('Limpeza e dragagem de rios, portos, canais, baías, lagos, lagoas, represas, açudes e congêneres',5,'07.18'),('Acompanhamento e fiscalização da execução de obras de engenharia, arquitetura e urbanismo',4,'07.19'),('Aerofotogrametria (inclusive interpretação), cartografia, mapeamento, levantamentos topográficos, batimétricos, geográficos, geodésicos, geológicos, geofísicos e congêneres',4,'07.20'),('Pesquisa,perfuração,cimentação,mergulho,perfilagem,concretação,testemunhagem,pescaria,estimulação e outros serviços relac. c/ a explor. e explot. petróleo,gás natural e outros rec. minerais',4,'07.21'),('Nucleação e bombardeamento de nuvens e congêneres',4,'07.22'),('SERVIÇOS DE EDUCAÇÃO, ENSINO, ORIENTAÇÃO PEDAGOGICA E EDUCACIONAL, instrução, treinamento e avaliação pessoal de qualquer grau ou natureza',0,'08.00'),('Ensino regular pré-escolar, fundamental, médio e superior',2,'08.01'),('Instrução, treinamento, orientação pedagógica e educacional, avaliação de conhecimentos de qualquer natureza',4,'08.02'),('SERVIÇOS RELATIVOS A HOSPEDAGEM,TURISMO, VIAGENS E CONGÊNERS',0,'09.00'),('Hosped. de qqr. natur. em hotéis,apart-service condom.,flat,apart-hotéis,hotéis resid.,residence-service,suite service,hotelaria marít.,motéis,pensões;ocup. p/ temporada c/ fornec. serviço',3,'09.01'),('Motéis e Congêneres',3,'09.012'),('Agenciamento, organização, promoção, intermediação e execução de programas de turismo, passeios, viagens, excursões, hospedagens e congêneres',3,'09.02'),('Guias de turismo',3,'09.03'),('SERVIÇOS DE INTERMEDIAÇÃO E CONGÊNERES',0,'10.00'),('Agenciamento, corretagem ou intermediação de câmbio, de seguros, de cartões de crédito, de planos de saúde e de planos de previdência privada)',3,'10.01'),('Agenciamento, corretagem ou intermediação de títulos em geral, valores mobiliários e contratos quaisquer',5,'10.02'),('Agenciamento, corretagem ou intermediação de direitos de propriedade industrial, artística ou literária',5,'10.03'),('Agenciamento, corretagem ou intermediação de contratos de arrendamento mercantil (leasing), de franquia (franchising) e de faturização (factoring)',5,'10.04'),('Agenciam.,corret. ou interm. de bens móveis ou imóveis,não abrang. em outros itens ou subitens,inclus. aqueles realiz. no âmbito de Bolsas de Mercadorias e Futuros,p/ qqr meios)',3,'10.05'),('Agenciamento marítimo',5,'10.06'),('Agenciamento de notícias',5,'10.07'),('Agenciamento de publicidade e propaganda, inclusive o agenciamento de veiculação por quaisquer meios',3,'10.08'),('Representação de qualquer natureza, inclusive comercial',2,'10.09'),('Distribuição de bens de terceiros',2,'10.10'),('SERVIÇOS DE INFORMATICA E CONGÊNERES',0,'11.00'),('Guarda e estacionamento de veículos terrestres automotores, de aeronaves e de embarcações',5,'11.01'),('Vigilância, segurança ou monitoramento de bens e pessoas',3,'11.02'),('Escolta, inclusive de veículos e cargas',3,'11.03'),('Armazenamento, depósito, carga, descarga, arrumação e guarda de bens de qualquer espécie',5,'11.04'),('SERVIÇOS DE DIVERSÕES, LAZER, ENTRETERIMENTO E CONGÊNERES',0,'12.00'),('Espetáculos teatrais',5,'12.01'),('Exibições cinematográficas',5,'12.02'),('Espetáculos circenses',5,'12.03'),('Programas de auditório',5,'12.04'),('Parques de diversões, centros de lazer e congêneres',5,'12.05'),('Boates, taxi-dancing e congêneres',5,'12.06'),('Shows, ballet, danças, desfiles, bailes, óperas, concertos, recitais, festivais e congêneres',5,'12.07'),('Feiras, exposições, congressos e congêneres',5,'12.08'),('Bilhares, boliches e diversões eletrônicas ou não',5,'12.09'),('Corridas e competições de animais',5,'12.10'),('Competições esportivas ou de destreza física ou intelectual, com ou sem a participação do espectador',5,'12.11'),('Execução de música',5,'12.12'),('Produção, mediante ou sem encomenda prévia, de eventos, espetáculos, entrevistas, shows, ballet, danças, desfiles, bailes, teatros, óperas, concertos, recitais, festivais e congêneres',5,'12.13'),('Fornecimento de música para ambientes fechados ou não, mediante transmissão por qualquer processo',5,'12.14'),('Desfiles de blocos carnavalescos ou folclóricos, trios elétricos e congêneres',5,'12.15'),('Exibição de filmes, entrevistas, musicais, espetáculos, shows, concertos, desfiles, óperas, competições esportivas, de destreza intelectual ou congêneres',5,'12.16'),('Recreação e animação, inclusive em festas e eventos de qualquer natureza',5,'12.17'),('SERVIÇOS RELATIVOS A FONOGRAFIA, FOTOGRAFIA, CINEMATOGRAFIA E REPROGRAFIA',0,'13.00'),('Fonografia ou gravação de sons, inclusive trucagem, dublagem, mixagem e congêneres',5,'13.02'),('Fotografia e cinematografia, inclusive revelação, ampliação, cópia, reprodução, trucagem e congêneres',5,'13.03'),('Reprografia, microfilmagem e digitalização',5,'13.04'),('Composição gráfica, fotocomposição, clicheria, zincografia, litografia, fotolitografia',2,'13.05'),('SERVIÇOS RELATIVOS A BENS DE TERCEIROS',0,'14.00'),('Lubrific.,limpeza,lustração,revisão,carga,recarga,conserto,restauração,blindagem,manutenção e cons. de máquinas,veículos,aparelhos,equip.,motores,elevadores ou de qqr objeto',5,'14.01'),('Assistência técnica',5,'14.02'),('Recondicionamento de motores (exceto peças e partes empregadas, que ficam sujeitas ao ICMS)',5,'14.03'),('Recauchutagem ou regeneração de pneus',5,'14.04'),('Restauração, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodização, corte, recorte, polimento, plastificação',5,'14.05'),('Instalação e montagem de aparelhos, máquinas e equipamentos, inclusive montagem industrial, prestados ao usuário final, exclusivamente com material por ele fornecido',5,'14.06'),('Colocação de molduras e congêneres',5,'14.07'),('Encadernação, gravação e douração de livros, revistas e congêneres',5,'14.08'),('Alfaiataria e costura, quando o material for fornecido pelo usuário final, exceto aviamento',3,'14.09'),('Tinturaria e lavanderia',5,'14.10'),('Tapeçaria e reforma de estofamentos em geral',5,'14.11'),('Funilaria e lanternagem',5,'14.12'),('Carpintaria e serralheria',5,'14.13'),('SERVIÇOS RELACIONADOS AO SETOR BANCARIO OU FINANCEIRO, INCLUSIVE AQUELES PRESTADOS POR INSTITUIÇOES FINANCEIRAS AUTORIZADAS A FUNICONAR PELA UNIÃO OU POR QUEM TEM DIREITO',0,'15.00'),('Administração de fundos quaisquer, de consórcio, de cartão de crédito ou débito e congêneres, de carteira de clientes, de cheques pré-datados e congêneres',5,'15.01'),('Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicação e caderneta de poupança, no País e no exterior',5,'15.02'),('Locação e manutenção de cofres particulares, de terminais eletrônicos, de terminais de atendimento e de bens e equipamentos em geral',5,'15.03'),('Fornecimento ou emissão de atestados em geral, inclusive atestado de idoneidade, atestado de capacidade financeira e congêneres',5,'15.04'),('Cadastro, elaboração de ficha cadastral, renovação cadastral e congêneres, inclusão ou exclusão no Cadastro de Emitentes de Cheques sem Fundos – CCF ou em quaisquer outros bancos cadastrais',5,'15.05'),('Emissão de avisos, comprov. e doctos. em geral;abono de firmas;coleta e entrega de doctos,bens e valores;comunicação com outra agência ou com a administração central;licenciamento...',5,'15.06'),('Acesso, movimentação, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-símile, internet e telex, acesso a terminais de atendimento, ...',5,'15.07'),('Emissão, reemissão, alteração, cessão, substituição, cancelamento e registro de contrato de crédito; estudo, análise e avaliação de operações de crédito; emissão, concessão, alteração ...',5,'15.08'),('Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessão de direitos e obrigações, substituição de garantia, alteração, cancelamento e registro de contrato, e demais ...',5,'15.09'),('Serviços relacionados a cobranças, recebimentos ou pagamentos em geral, de títulos quaisquer, de contas ou carnês, de câmbio, de tributos e por conta de terceiros, inclusive os ...',5,'15.10'),('Devolução de títulos, protesto de títulos, sustação de protesto, manutenção de títulos, reapresentação de títulos, e demais serviços a eles relacionados',5,'15.11'),('Custódia em geral, inclusive de títulos e valores mobiliários',5,'15.12'),('Serviços relacionados a operações de câmbio em geral, edição, alteração, prorrogação, cancelamento e baixa de contrato de câmbio; emissão de registro de exportação ou de crédito; ...',5,'15.13'),('Fornecimento, emissão, reemissão, renovação e manutenção de cartão magnético, cartão de crédito, cartão de débito, cartão salário e congêneres',5,'15.14'),('Compensação de cheques e títulos quaisquer; serviços relacionados a depósito, inclusive depósito identificado, a saque de contas quaisquer, por qualquer meio ou processo, inclusiv...',5,'15.15'),('Emissão, reemissão, liquidação, alteração, cancelamento e baixa de ordens de pagamento, ordens de crédito e similares, por qualquer meio ou processo; serviços relacionados à ...',5,'15.16'),('Emissão, fornecimento, devolução, sustação, cancelamento e oposição de cheques quaisquer, avulso ou por talão',5,'15.17'),('Serviços relacionados a crédito imobiliário, avaliação e vistoria de imóvel ou obra, análise técnica e jurídica, emissão, reemissão, alteração, transferência e renegociação ...',5,'15.18'),('SERVIÇOS DE TRANSPORTE DE NATUREZA MUNICIPAL',0,'16.00'),('Serviços de transporte de natureza municipal',5,'16.01'),('Serviços de Transporte coletivo urbano',2,'16.011'),('SERVIÇOS DE APOIO TECNICO, ADMINISTRATIVO, JURIDICO, CONTABIL, COMERCIAL E CONGÊNERES',0,'17.00'),('Assessoria ou consultoria de qualquer natureza, não contida em outros itens desta lista; análise, exame, pesquisa, coleta, compilação e fornecimento de dados e informações d...',5,'17.01'),('Datilografia, digitação, estenografia, expediente, secretaria em geral, resposta audível, redação, edição, interpretação, revisão, tradução, apoio e infra-estrutura ...',5,'17.02'),('Planejamento, coordenação, programação ou organização técnica, financeira ou administrativa',5,'17.03'),('Recrutamento, agenciamento, seleção e colocação de mão-de-obra',4,'17.04'),('Fornecimento de mão-de-obra, mesmo em caráter temporário, inclusive de empregados ou trabalhadores, avulsos ou temporários, contratados pelo prestador de serviço',4,'17.05'),('Propaganda e publicidade, inclusive promoção de vendas, planejamento de campanhas ou sistemas de publicidade, elaboração de desenhos, textos e demais materiais publicitários',4,'17.06'),('Franquia (franchising)',5,'17.08'),('Perícias, laudos, exames técnicos e análises técnicas',4,'17.09'),('Planejamento, organização e administração de feiras, exposições, congressos e congêneres',5,'17.10'),('Organização de festas e recepções; bufê (exceto o fornecimento de alimentação e bebidas, que fica sujeito ao ICMS)',5,'17.11'),('Administração em geral, inclusive de bens e negócios de terceiros',3,'17.12'),('Administração de bens imóveis',3,'17.121'),('Administração em geral, inclusive de bens e negócios de terceiros',3,'17.122'),('Leilão e congêneres',2,'17.13'),('Advocacia',3,'17.14'),('Arbitragem de qualquer espécie, inclusive jurídica',5,'17.15'),('Auditoria',3,'17.16'),('Análise de Organização e Métodos',5,'17.17'),('Atuária e cálculos técnicos de qualquer natureza',4,'17.18'),('Contabilidade, inclusive serviços técnicos e auxiliares',3,'17.19'),('Consultoria e assessoria econômica ou financeira',5,'17.20'),('Estatística',4,'17.21'),('Cobrança em geral',5,'17.22'),('Assessoria, análise, avaliação, atendimento, consulta, cadastro, seleção, gerenciamento de informações, administração de contas a receber ou a pagar,relac. a operações de faturização',5,'17.23'),('Apresentação de palestras, conferências, seminários e congêneres',4,'17.24'),('SERVIÇOS DE SINISTROS VINCULADOS A CONTRATOS DE SEGUROS; INSPEÇÃO E AVALIAÃO DE RISCOS PARA COBERTURA DE CONTRATOS DE SEGURO; PREVENÇÃO E GERENCIA DE RISCOS SEGURÁVEIS E CONGÊNERES',0,'18.00'),('Serviços de regulação de sinistros vinculados a contratos de seguros; inspeção e avaliação de riscos para cobertura de contratos de seguros; prevenção e gerência de riscos...',5,'18.01'),('SERVIÇOS DE  DISTRIB. E VENDA DE BILHETES E DEMAIS PRODUTOS DE LOTERIAS,BINGOS,CARTOES,PULES OU CUPONS DE APOSTAS,SORTEIOS,PREMIOS,INCLUS. OS DECORRENTES DE TITULOS DE CAPITALIZAÇÃO',0,'19.00'),('Serviços de distribuição e venda de bilhetes e demais produtos de loteria, bingos, cartões, pules ou cupons de apostas, sorteios, prêmios, inclusive os decorrentes de títulos ...',3,'19.01'),('SERVIÇOS PORTUÁRIOS, AEROPORTUÁRIOS, FERROPORTUÁRIOS, DE TERMINAIS RODOVIÁRIOS, FERROVIÁRIOS E METROVIÁRIOS',0,'20.00'),('Serviços portuários, ferroportuários, utilização de porto, movimentação de passageiros, reboque de embarcações, rebocador escoteiro, atracação, desatracação, serviços de ...',5,'20.01'),('Serviços aeroportuários, utilização de aeroporto, movimentação de passageiros, armazenagem de qualquer natureza, capatazia, movimentação de aeronaves, serviços de apoio ...',5,'20.02'),('Serviços de terminais rodoviários, ferroviários, metroviários, movimentação de passageiros, mercadorias, inclusive     suas operações, logística e congêneres',5,'20.03'),('SERVIÇOS DE RESGISTROS PUBLICOS, CARTORARIOS E NOTARIAIS',0,'21.00'),('Serviços de registros públicos, cartorários e notariais',2,'21.01'),('SERVIÇOS DE EXPLORAÇÃO DE RODOVIA',0,'22.00'),('Serviços de exploração de rodovia mediante cobrança de preço ou pedágio dos usuários, envolvendo execução de serviços de conservação, manutenção, melhoramentos para ...',5,'22.01'),('SERVIÇOS DE PROGRAMAS E COMUNICAÇÃO VISUAL, DESENHO INDUSTRIAL E CONGÊNERES',0,'23.00'),('Serviços de programação e comunicação visual, desenho industrial e congêneres',4,'23.01'),('SERVIÇOS DE CHAVEIROS, CONFECÇÃO DE CARIMBOS, PLACAS, SINALIZAÇÃO VISUAL, BANERS, ADESIVOS E CONGÊNERES',0,'24.00'),('Serviços de chaveiros, confecção de carimbos, placas, sinalização visual, banners, adesivos e congêneres',4,'24.01'),('SERVIÇOS FUNERÁIOS',0,'25.00'),('Funerais, inclusive fornecimento de caixão, urna ou esquifes; aluguel de capela; transporte do corpo cadavérico; fornecimento de flores, coroas e outros paramentos; ...',5,'25.01'),('Cremação de corpos e partes de corpos cadavéricos',5,'25.02'),('Planos ou convênio funerários',5,'25.03'),('Manutenção e conservação de jazigos e cemitérios',5,'25.04'),('SERVIÇOS DE COLETA, REMESSA OU ENTREGA DE CORRESPONDENCIAS, DOCUMENTOS, OBJETOS, BENS OU VALORES, INCLUSIVE PELOS CORREIOS E SUAS AGÊNCIAS FRANQUEADAS; COURRIER E CONGÊNERES',0,'26.00'),('Serviços de coleta, remessa ou entrega de correspondências, documentos, objetos, bens ou valores, inclusive pelos correios e suas agências franqueadas; courrier e congêneres',5,'26.01'),('SERVIÇOS DE ASSISTÊNCIA SOCIAL',0,'27.00'),('Serviços de assistencia social',5,'27.01'),('SERVIÇOS DE AVALIAÇÃO DE BENS E SERVIÇOS DE QUALQUER NATUREZA',0,'28.00'),('Serviços de avaliação de bens e serviços de qualquer natureza',5,'28.01'),('SERVIÇOS DE BIBLIOTECONOMIA',0,'29.00'),('Serviços de biblioteconomia',5,'29.01'),('SERVIÇOS DE BIOLOGIA, BIOTECNOLOGIA E QUIMICA',0,'30.00'),('Serviços de biologia, biotecnologia e química',5,'30.01'),('SERVIÇOS TECNICOS EM EDIFICAÇÕES ELETRONICA, ELETROTECNICA, MECANICA, TELECOMUNICAÇÕES E CONGÊNERES',0,'31.00'),('Serviços técnicos em edificações, eletrônica, eletrotécnica, mecânica, telecomunicações e congêneres',5,'31.01'),('SERVIÇOS DE DEZENHO TECNICO ',0,'32.00'),('Serviços de desenhos técnicos',3,'32.01'),('SERVIÇO DE DESEMBARAÇO ADUANEIRO, COMISSÁRIOS, DESPACHANTES E CONGÊNERES',0,'33.00'),('Serviço de desembaraço aduaneiro, comissários, despachantes e congêneres',5,'33.01'),('SERVIÇOS DE INVESTIGAÇÃO PARTICULARES, DETETIVES E CONGÊNERES',0,'34.00'),('Serviços de investigações particulares, detetives e congêneres',5,'34.01'),('SERVIÇOS DE REPORTAGEM, ASSESSORIA DE IMPRENSA, JORNALISMO E RELAÇÕES PÚBLICAS',0,'35.00'),('Serviços de reportagem, assessoria de imprensa, jornalismo e relações públicas',5,'35.01'),('SERVIÇOS DE METEOROLOGIA',0,'36.00'),('Serviços de meteorologia',5,'36.01'),('SERVIÇOS DE ARTISTAS, ATLETAS, MODELOS E MANEQUINS',0,'37.00'),('Serviços de artistas, atletas, modelos e manequins',5,'37.01'),('SERVIÇOS DE MUSEOLOGIA',0,'38.00'),('Serviços de museologia',5,'38.01'),('SERVIÇOS DE OURIVESARIA E LAPIDAÇÃO',0,'39.00'),('Serviços de ourivesaria e lapidação (quando o material for fornecido pelo tomador do serviço)',5,'39.01'),('SERVIÇOS RELATIVOS A OBRAS DE ARTE SOB ENCOMENDA',0,'40.00'),('Obras de arte sob encomenda',5,'40.01');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota` (
  `EMPRESA` int(11) DEFAULT NULL,
  `NUMERO_NOTA` int(11) DEFAULT NULL,
  `CLIENTE` int(11) DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `MES` int(11) DEFAULT NULL,
  `ANO` int(11) DEFAULT NULL,
  `CANCELADA` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MOTIVO` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERC_PIS` double DEFAULT NULL,
  `PIS` double DEFAULT NULL,
  `CSL` double DEFAULT NULL,
  `COFINS` double DEFAULT NULL,
  `INSS` double DEFAULT NULL,
  `ISS` double DEFAULT NULL,
  `ISS_RETIDO` double DEFAULT NULL,
  `BASE_ISS` double DEFAULT NULL,
  `DESCONTO` double DEFAULT NULL,
  `TOTAL` double DEFAULT NULL,
  `IRRF` double DEFAULT NULL,
  `ID_FATURAMENTO` int(11) DEFAULT NULL,
  `TOTAL_BRUTO` double DEFAULT NULL,
  `TIPO_NOTA` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IRRF_ORIG` double DEFAULT NULL,
  `PIS_ORIG` double DEFAULT NULL,
  `CSL_ORIG` double DEFAULT NULL,
  `COFINS_ORIG` double DEFAULT NULL,
  `INSS_ORIG` double DEFAULT NULL,
  `ISS_ORIG` double DEFAULT NULL,
  `ISS_RETIDO_ORIG` double DEFAULT NULL,
  `NUMERO_NOTA_SUBSTITUTIVA` int(11) DEFAULT NULL,
  `AUTENTICIDADE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LINKIMPRESSAO` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AUTENTICIDADE_CANCELAMENTO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LINKIMPRESSAO_CANCELAMENTO` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OBSERVACAO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FORMAPAGAMENTO` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `nota` VALUES (1,NULL,1,'2016-10-06',6,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,42),(1,104,1,'2016-10-06',6,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'M1T5PLL9','http://testeiss.londrina.pr.gov.br/nfse/nfse.php?id=15910161&hash=M1T5PLL9&nfe=104',NULL,NULL,'','','Enviada',43),(1,NULL,1,'2016-10-06',6,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,44),(1,105,1,'2016-10-06',6,2016,'S','2 – Serviço não prestado',NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'41MNA8UF','http://testeiss.londrina.pr.gov.br/nfse/nfse.php?id=15910162&hash=41MNA8UF&nfe=105',NULL,'http://testeiss.londrina.pr.gov.br/nfse/nfse.php?id=15910162&hash=41MNA8UF&nfe=105','','','Cancelada',45),(1,NULL,1,'2016-10-06',6,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,46),(1,106,1,'2016-10-06',6,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'TNUGLCIH','http://testeiss.londrina.pr.gov.br/nfse/nfse.php?id=15910163&hash=TNUGLCIH&nfe=106',NULL,NULL,'','','Enviada',47),(1,NULL,1,'2016-10-06',6,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,48),(1,107,1,'2016-10-06',6,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'KNPEARTC','http://testeiss.londrina.pr.gov.br/nfse/nfse.php?id=15910164&hash=KNPEARTC&nfe=107',NULL,NULL,'','','Enviada',49),(1,NULL,1,'2016-10-06',6,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,50),(1,NULL,1,'2016-10-06',6,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','','Não Enviada',51),(1,NULL,1,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,52),(1,NULL,1,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','','Não Enviada',53),(1,NULL,1,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,54),(1,NULL,1,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','','Não Enviada',55),(1,NULL,1,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,56),(1,NULL,1,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','','Não Enviada',57),(1,NULL,2,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,58),(1,NULL,2,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','','Não Enviada',59),(1,NULL,1,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'',NULL,NULL,NULL,'','',NULL,60),(1,108,1,'2016-10-07',7,2016,NULL,NULL,NULL,0,0,0,0,0.02,0,1.02,0,1.02,0,0,1.02,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'3EPIT1TS','http://testeiss.londrina.pr.gov.br/nfse/nfse.php?id=15910168&hash=3EPIT1TS&nfe=108',NULL,NULL,'','','Enviada',61);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_itens` (
  `ID_NOTA` int(11) NOT NULL,
  `COD_SERVICO` int(11) NOT NULL,
  `DESCRICAO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QUANTIDADE` decimal(15,2) DEFAULT NULL,
  `VALOR` decimal(15,2) DEFAULT NULL,
  `DESCONTO` decimal(15,2) DEFAULT NULL,
  `VALORISS` decimal(15,2) DEFAULT NULL,
  `PERCISS` decimal(15,2) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `nota_itens` VALUES (42,1,'Programação',1.00,1.00,0.00,0.02,2.00,35),(44,1,'Programação',1.00,1.00,0.00,0.02,2.00,36),(46,1,'Programação',1.00,1.00,0.00,0.02,2.00,37),(48,1,'Programação',1.00,1.00,0.00,0.02,2.00,38),(50,1,'Programação',1.00,1.00,0.00,0.02,2.00,39),(52,0,'',0.00,0.00,0.00,0.00,0.00,40),(54,0,'',0.00,0.00,0.00,0.00,0.00,41),(56,0,'',0.00,0.00,0.00,0.00,0.00,42),(58,1,'Programação',1.00,1.00,0.00,0.02,2.00,43),(60,1,'Programação',1.00,1.00,0.00,0.02,2.00,44);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plano` (
  `EMPRESA` int(11) NOT NULL,
  `DESCRICAO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PLANO` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TIPO` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `plano` VALUES (1,'Receitas','10.00','S',1,1),(1,'Venda a Vista','10.01','S',1,2),(1,'Venda a Prazo','10.02','S',1,3),(1,'Rendimento de Aplicações Financeiras','10.03','S',1,4),(1,'Taxa de Investimento','10.04','S',1,5),(1,'Outras Receitas','10.50','S',1,6),(1,'Compras','20.00','E',1,7),(1,'Compra a Vista','20.01','E',1,8),(1,'Compra a Prazo','20.02','E',1,9),(1,'Despesas c/ Pessoal','30.00','E',1,10),(1,'Salários e Ordenados','30.01','E',1,11),(1,'Rescisões Trabalhistas','30.02','E',1,12),(1,'13º Salário e Férias','30.03','E',1,13),(1,'Férias e Adicionais','30.04','E',1,14),(1,'Vale Transporte','30.06','E',1,15),(1,'Cestas Básicas','30.08','E',1,16),(1,'Medicina do Trabalho','30.13','E',1,17),(1,'Convênio Médico','30.14','E',1,18),(1,'Encargos Sociais','35.00','E',1,19),(1,'Previdência Social','35.01','E',1,20),(1,'F.G.T.S.','35.02','E',1,21),(1,'P.I.S.','35.03','E',1,22),(1,'Contribuição Sindical','35.04','E',1,23),(1,'Reversão Salarial','35.05','E',1,24),(1,'Contribuição Confederativa','35.06','E',1,25),(1,'Contribuicao ao Servico Social','35.07','E',1,26),(1,'Servicos de Terceiros','40.00','E',1,27),(1,'Agua e Esgoto','40.01','E',1,28),(1,'Energia Elétrica','40.02','E',1,29),(1,'Telefone','40.03','E',1,30),(1,'Honorários Profissionais','40.04','E',1,31),(1,'Taxa de Balanco','40.05','E',1,32),(1,'Jardinagem','40.06','E',1,33),(1,'Cartório, Cópias e Correios','40.07','E',1,34),(1,'Manutenção e Conservação','40.09','E',1,35),(1,'Seguros','40.10','E',1,36),(1,'Despesas c/ Extintores','40.11','E',1,37),(1,'Verba de Representação','40.13','E',1,38),(1,'Honorarios Advocaticios','40.15','E',1,39),(1,'Custas judiciais','40.16','E',1,40),(1,'Outros Serviços','40.99','E',1,41),(1,'Materiais','50.00','E',1,42),(1,'Limpeza e Higiene','50.01','E',1,43),(1,'Materiais Pintura','50.02','E',1,44),(1,'Materiais de Escritório','50.03','E',1,45),(1,'Materiais Hidraulico','50.04','E',1,46),(1,'Materiais Construção','50.05','E',1,47),(1,'Materiais p/ Reparos e Conservação','50.06','E',1,48),(1,'Maquinas e Equipamentos','50.07','E',1,49),(1,'Outras Despesas com Materiais','50.99','E',1,50),(1,'Despesas Diversas','60.00','E',1,51),(1,'Tarifas Bancarias','60.01','E',1,52),(1,'Impostos Federais','60.02','E',1,53),(1,'Juros e Multas','60.03','E',1,54),(1,'Impostos e Taxas','60.04','E',1,55),(1,'Despesas c/ Conducao','60.05','E',1,56),(1,'Despesas Miudas','60.99','E',1,57),(1,'Aquisição Bens/Benfeitorias','90.00','E',1,58),(1,'Interfones','90.01','E',1,59),(1,'Maquinas e Equipamentos','90.02','E',1,60),(1,'Móveis e Utensílios','90.03','E',1,61),(1,'Pintura Muro e Escadarias','90.04','E',1,62),(1,'Reformas nos Blocos','90.05','E',1,63),(1,'Contas Transitorias','99.00','S',1,64),(1,'Saldo Inicial','99.01','S',1,65),(1,'Suprimento de Caixa','99.02','S',1,66),(1,'Deposito Bancário','99.03','S',1,67),(1,'Transferência entre Conta Corrente','99.04','S',1,68),(1,'Aplicações Financeira','99.05','S',1,69),(1,'Transferencia para conta poupanca','99.06','E',1,70),(1,'Deposito em conta corrente','99.07','E',1,71),(0,'Contas Transitorias','99.00','S',1,72),(0,'Saldo Inicial','99.01','S',1,73),(0,'Suprimento de Caixa','99.02','S',1,74),(0,'Deposito Bancário','99.03','S',1,75),(0,'Transferência entre Conta Corrente','99.04','S',1,76),(0,'Aplicações Financeira','99.05','S',1,77),(0,'Transferencia para conta poupanca','99.06','S',1,78),(0,'Deposito em conta corrente','99.07','S',1,79);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recebimento_itens_conta_pagar_receber` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_EMPRESA` int(11) NOT NULL,
  `ID_ITEM_CONTA` int(11) NOT NULL,
  `VALOR` double DEFAULT NULL,
  `ACRESCIMO` double DEFAULT NULL,
  `DESCONTO` double DEFAULT NULL,
  `DATA_LANCAMENTO` date DEFAULT NULL,
  `HISTORICO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forma_pagamento` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `DESCRICAO` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERC_IRRF` double DEFAULT NULL,
  `PERC_CSL` double DEFAULT NULL,
  `PERC_PIS` double DEFAULT NULL,
  `PERC_COFINS` double DEFAULT NULL,
  `PERC_ISS` double DEFAULT NULL,
  `PLANO` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ISS_SUSPENSO` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ISS_SUSPENSO_MOTIVO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COD_SER_PREF` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VALOR` double DEFAULT NULL,
  `IBPT_NAC` double DEFAULT NULL,
  `IBPT_MUN` double DEFAULT NULL,
  `EMPRESA` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `servico` VALUES ('Programação',0,0,0,0,2,'10.00',NULL,NULL,'01.02',1,NULL,NULL,1,1),('Licenciamento ou cessão de direito de uso de programas de computação',0,0,0,0,2,'10.00',NULL,NULL,'01.05',2,NULL,NULL,1,2),('Processamento de dados e congêneres',0,0,0,0,2,'10.00',NULL,NULL,'01.03',2,NULL,NULL,1,3),('Assessoria e consultoria em informática',0,0,0,0,2,'10.00',NULL,NULL,'01.06',1,NULL,NULL,1,4),('Nutrição',0,0,0,0,3,'10.00',NULL,NULL,'04.10',9,NULL,NULL,1,5),('Assessoria e consultoria em informática',0,0,0,0,2,'10.00',NULL,NULL,'01.06',3,NULL,NULL,1,6),('SERVIÇOS DE INFORMÁTICA E CONGÊNERES',0,0,0,0,0,'10.00',NULL,NULL,'01.00',1,NULL,NULL,1,7);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `user` VALUES ('ROLE_USER','Vinicius','Rodrigues','vinicius@sibrax.com.br','$2y$04$WM17yAB/.9QSwbGPCXrrIuRk6W0ihn52iUzkML0Py9FoFx1bWMhNe',NULL,1),('ROLE_USER','Hilquias','Xuxa','hilquias@sibrax.com.br','$2y$04$WM17yAB/.9QSwbGPCXrrIuRk6W0ihn52iUzkML0Py9FoFx1bWMhNe',NULL,2),('ROLE_USER','Adriano','Dri','adriano@sibrax.com.br','$2y$04$wzMAjWNWsdpWKW4ujFnLEeHfniJ0EfDiyBQ8lAB4Z8TqbicR74.ZK',NULL,3),('ROLE_USER','Teste','AAA','teste@teste.com','$2y$04$6V30nI/lKRo5/iMh9R15duEbgVQOnVimfhyOfHt1ugu8ABuVlZk/y',NULL,4);


Create table agenda (
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	data_inicio datetime NOT NULL,
	data_fim datetime,
	descricao_evento TEXT,
	responsavel_evento VARCHAR(255),
	idCliente int(11)
)