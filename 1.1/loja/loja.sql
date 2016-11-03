-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Generação: Nov 26, 2006 at 05:50 PM
-- Versão do Servidor: 4.1.9
-- Versão do PHP: 4.3.10
-- 
-- Banco de Dados: `loja2`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `admin`
-- 

CREATE TABLE `admin` (
  `cod_admin` int(12) NOT NULL auto_increment,
  `apelido` varchar(12) default NULL,
  `senha` varchar(12) default NULL,
  PRIMARY KEY  (`cod_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `admin`
-- 

INSERT INTO `admin` VALUES (3, 'tutojogos.com.br', 'tutojogos.com.br');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `categorias`
-- 

CREATE TABLE `categorias` (
  `cod_cat` int(11) NOT NULL auto_increment,
  `nome_cat` varchar(60) default NULL,
  PRIMARY KEY  (`cod_cat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Extraindo dados da tabela `categorias`
-- 

INSERT INTO `categorias` VALUES (5, 'Livros');
INSERT INTO `categorias` VALUES (7, 'DVD');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `compras`
-- 

CREATE TABLE `compras` (
  `cod_compra` int(11) NOT NULL auto_increment,
  `nome_prod` varchar(120) default NULL,
  `valor` int(11) default NULL,
  `quantidade` int(10) default NULL,
  `id_temp` varchar(60) default NULL,
  `form_pag` varchar(20) default NULL,
  `status` varchar(10) default 'nao',
  `cod_usuario` int(11) default NULL,
  PRIMARY KEY  (`cod_compra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `compras`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `produtos`
-- 

CREATE TABLE `produtos` (
  `cod_prod` int(11) NOT NULL auto_increment,
  `nome_prod` varchar(60) default NULL,
  `descricao` text,
  `fot_peq` varchar(60) default NULL,
  `fot_1` varchar(60) default NULL,
  `fot_2` varchar(60) default NULL,
  `fot_3` varchar(60) default NULL,
  `fot_4` varchar(60) default NULL,
  `fot_5` varchar(60) default NULL,
  `fot_6` varchar(60) default NULL,
  `fot_7` varchar(60) default NULL,
  `fot_8` varchar(60) default NULL,
  `valor` varchar(60) default NULL,
  `garan` varchar(60) default NULL,
  `quan` varchar(60) default NULL,
  `localiza` varchar(60) default NULL,
  `destaque` varchar(60) default NULL,
  `tipo` varchar(60) default NULL,
  `cod_cat` int(60) default NULL,
  PRIMARY KEY  (`cod_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Extraindo dados da tabela `produtos`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuarios`
-- 

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL auto_increment,
  `nome` varchar(120) default NULL,
  `email` varchar(60) default NULL,
  `senha` varchar(60) default NULL,
  `endereco` text,
  `pais` varchar(60) default NULL,
  `estado` varchar(10) default NULL,
  `cidade` varchar(60) default NULL,
  `cep` varchar(10) default NULL,
  `autoriza` varchar(6) default NULL,
  `nome_cartao` varchar(120) default NULL,
  `cartao` varchar(12) default NULL,
  `cartao_numero` varchar(60) default NULL,
  `cartao_cvc` varchar(10) default NULL,
  `cartao_data` varchar(60) default NULL,
  `status` varchar(4) default 'nao',
  `form_pag` varchar(60) default NULL,
  `data_compra` varchar(16) default NULL,
  PRIMARY KEY  (`cod_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


