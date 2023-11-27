
DELIMITER $$
--
-- Procedimentos
--
CREATE PROCEDURE `calc_desconto` (IN `p_id_venda` INT, OUT `p_vlr_venda` FLOAT)   BEGIN
	SELECT 
		(vlr_venda * venda.prc_desconto) as vlr_desconto
        INTO p_vlr_venda
		FROM venda 
	LEFT JOIN venda_item ON venda.id = venda_item.id
    WHERE venda.id = p_id_venda;
END$$

CREATE PROCEDURE `calc_desconto1` ()   BEGIN
	SELECT 
		venda.data AS data, 
		vendedor.nome_vendedor AS nome_vendedor, 
		venda_item.qtd_vendas AS qtd_vendas, 
		produto.desc_produto AS desc_produto, 
		produto.capacidade AS capacidade, 
		cor.desc_cor AS desc_cor, 
		venda_item.vlr_venda AS vlr_venda, 
		venda.prc_desconto,
		produto.vlr_sugerido,
		ROUND((vlr_venda * venda.prc_desconto),2) as vlr_desconto,
		cliente.nome AS nome 
		FROM venda 
	LEFT JOIN vendedor ON venda.id_vendedor = vendedor.id 
	LEFT JOIN venda_item ON venda.id = venda_item.id 
	LEFT JOIN produto ON venda_item.id_produto = produto.id 
	LEFT JOIN cor ON produto.id_cor = cor.id 
	LEFT JOIN cliente ON venda.id_cliente = cliente.id;
END$$

CREATE PROCEDURE `celcius_farenheit` (IN `celcius` FLOAT, IN `farenheit` FLOAT, OUT `total` FLOAT)   BEGIN 
	IF celcius = 0 THEN
		SET total = (farenheit - 32) / 1.8;
	ELSE
		SET total = (celcius*1.8)+32;
	END IF;
END$$

CREATE PROCEDURE `IMC` (IN `altura` FLOAT, IN `peso` FLOAT, OUT `imc` FLOAT)   BEGIN 
	SET imc = peso/(altura * altura);
END$$

CREATE PROCEDURE `InsertCliente` (IN `p_nome` VARCHAR(100), IN `p_data_nascimento` DATE, IN `p_data_cadastro` DATE, IN `p_cpf_cnpj` VARCHAR(14), IN `p_genero` CHAR(1), OUT `p_id` INT)   BEGIN
    DECLARE existing_id INT;
    SELECT id INTO existing_id FROM cliente WHERE cpf_cnpj = p_cpf_cnpj LIMIT 1;

    IF existing_id IS NULL THEN
        INSERT INTO cliente (nome, data_nascimento, data_cadastro, cpf_cnpj, genero)
        VALUES (p_nome, p_data_nascimento, p_data_cadastro, p_cpf_cnpj, p_genero);
        SET p_id = LAST_INSERT_ID();
    END IF;
END$$

CREATE PROCEDURE `InsertEmail` (IN `p_id_cliente` INT, IN `p_email` VARCHAR(50), IN `p_tipo` VARCHAR(15))   BEGIN
    DECLARE existing_id INT;

    SELECT id INTO existing_id FROM email WHERE id_cliente = p_id_cliente AND tipo = p_tipo LIMIT 1;

    IF existing_id IS NULL THEN
        INSERT INTO email (id_cliente, email, tipo)
        VALUES (p_id_cliente, p_email, p_tipo);
    END IF;
END$$

CREATE PROCEDURE `InsertEndereco` (IN `p_id_cliente` INT, IN `p_logradouro` VARCHAR(100), IN `p_numero` VARCHAR(20), IN `p_complemento` VARCHAR(40), IN `p_cep` VARCHAR(8), IN `p_bairro` VARCHAR(50), IN `p_cidade` VARCHAR(50), IN `p_estado` VARCHAR(2), IN `p_tipo` VARCHAR(20))   BEGIN
    DECLARE existing_id INT;

    SELECT id INTO existing_id FROM endereco WHERE id_cliente = p_id_cliente AND tipo = p_tipo LIMIT 1;

    IF existing_id IS NULL THEN
        INSERT INTO endereco (id_cliente, logradouro, numero, complemento, cep, bairro, cidade, estado, tipo)
        VALUES (p_id_cliente, p_logradouro, p_numero, p_complemento, p_cep, p_bairro, p_cidade, p_estado, p_tipo);

    END IF;
END$$

CREATE PROCEDURE `InsertEstoque` (IN `p_id_produto` INT, IN `p_id_filial` INT, IN `p_qt_estoque` INT)   BEGIN
    DECLARE existing_id INT;

    SELECT id INTO existing_id FROM estoque WHERE id_produto = p_id_produto AND id_filial = p_id_filial LIMIT 1;

    IF existing_id IS NULL THEN
        INSERT INTO estoque (id_produto, id_filial, qt_estoque) VALUES (p_id_produto, p_id_filial, p_qt_estoque);
    END IF;
END$$

CREATE PROCEDURE `InsertFone` (IN `p_id_cliente` INT, IN `p_numero` VARCHAR(20), IN `p_tipo` VARCHAR(20), IN `p_contato` VARCHAR(50))   BEGIN
    INSERT INTO fone (id_cliente, numero, tipo, contato)
    VALUES (p_id_cliente, p_numero, p_tipo, p_contato);
END$$

CREATE PROCEDURE `InsertLinha` (IN `p_desc_linha` VARCHAR(50), OUT `p_id` INT)   BEGIN
    DECLARE existing_id INT;

    SELECT id INTO existing_id FROM linha WHERE desc_linha = p_desc_linha LIMIT 1;

    IF existing_id IS NULL THEN
        INSERT INTO linha (desc_linha) VALUES (p_desc_linha);
		SET p_id = LAST_INSERT_ID();
    END IF;
END$$

CREATE PROCEDURE `InsertMarca` (IN `p_desc_marca` VARCHAR(50), OUT `p_id` INT)   BEGIN
    DECLARE existing_id INT;

    SELECT id INTO existing_id FROM marca WHERE desc_marca = p_desc_marca LIMIT 1;

    IF existing_id IS NULL THEN
        INSERT INTO marca (desc_marca) VALUES (p_desc_marca);
		SET p_id = LAST_INSERT_ID();
    END IF;
END$$

CREATE PROCEDURE `InsertModelo` (IN `p_desc_modelo` VARCHAR(100), IN `p_id_marca` INT, IN `p_id_linha` INT, OUT `p_id` INT)   BEGIN
    DECLARE existing_id INT;

    SELECT id INTO existing_id FROM modelo WHERE desc_modelo = p_desc_modelo AND id_marca = p_id_marca AND id_linha = p_id_linha LIMIT 1;

    IF existing_id IS NULL THEN
        INSERT INTO modelo (desc_modelo, id_marca, id_linha) VALUES (p_desc_modelo, p_id_marca, p_id_linha);
		SET p_id = LAST_INSERT_ID();

    END IF;
END$$

CREATE PROCEDURE `InsertProduto` (IN `p_id_cor` INT, IN `p_id_modelo` INT, IN `p_desc_produto` VARCHAR(100), IN `p_capacidade` FLOAT, IN `p_vlr_sugerido` FLOAT, IN `p_vlr_custo` FLOAT, IN `p_voltagem` VARCHAR(10))   BEGIN
    DECLARE existing_id INT;

    SELECT id INTO existing_id FROM produto WHERE id_cor = p_id_cor AND id_modelo = p_id_modelo AND desc_produto = p_desc_produto LIMIT 1;

    IF existing_id IS NULL THEN
        INSERT INTO produto (id_cor, id_modelo, desc_produto, capacidade, vlr_sugerido, vlr_custo, voltagem) VALUES (p_id_cor, p_id_modelo, p_desc_produto, p_capacidade, p_vlr_sugerido, p_vlr_custo, p_voltagem);
    END IF;
END$$

CREATE PROCEDURE `letras_string` (IN `word` VARCHAR(100), OUT `qtd` INT)   BEGIN 
	DECLARE i INT DEFAULT 1;
    DECLARE char_count INT DEFAULT 0;
    WHILE i <= LENGTH(word) DO
        IF SUBSTRING(word, i, 1) REGEXP '[A-Za-z]' THEN
            SET char_count = char_count + 1;
        END IF;
        SET i = i + 1;
    END WHILE;
    SET qtd = char_count;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `cpf_cnpj` varchar(14) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `origem` varchar(20) DEFAULT NULL
) ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `data_nascimento`, `data_cadastro`, `cpf_cnpj`, `genero`, `origem`) VALUES
(2, 'Matias Julian Bulacio', '2000-02-15', '2023-09-16', '19999999999', 'M', 'pessoalmente'),
(3, 'Marcio Machado', '1989-11-17', '2023-09-16', '07953444909', 'M', 'pessoalmente'),
(4, 'RUAN LISBOA ULRICH', '2003-10-30', '2023-09-16', '66006660', 'M', 'pessoalmente'),
(5, 'SYDINEY LEANDRO DA SILVA', '1972-02-03', '2023-09-15', '99999999999', 'M', 'pessoalmente'),
(6, 'Matias Julian Bulacio', '2000-02-15', '2023-09-16', '19999999999', 'M', 'pessoalmente'),
(7, 'Marcio Machado', '1989-11-17', '2023-09-16', '07953444909', 'M', 'pessoalmente'),
(8, 'RUAN LISBOA ULRICH', '2003-10-30', '2023-09-16', '66006660', 'M', 'pessoalmente'),
(9, 'GABRIEL ESPINDOLA FERREIRA', '2003-03-30', '2023-09-16', '49275556822', 'M', 'pessoalmente'),
(10, 'LUCAS LUCIANO DUTRA CARLOS', '2004-06-06', '2023-09-16', '00000000000', 'M', 'pessoalmente'),
(11, 'GUSTAVO BATISTA DE SOUZA', '2004-03-01', '2023-09-15', '89056000090', 'M', 'pessoalmente'),
(12, 'WESLLEY CEZAR PROTSKI DE ABREU', '1992-01-08', '2023-09-15', '89056000090', 'M', 'pessoalmente'),
(13, 'EDUARDA DEPETRIS', '2004-07-18', '2023-09-15', '10610610652', 'F', 'pessoalmente'),
(14, 'FELIPE HENRIQUE RIBEIRO', '2004-10-11', '2023-09-15', '10610610652', 'M', 'pessoalmente'),
(15, 'MARIA BEATRIZ WAGNER TRINDADE', '2002-11-10', '2023-09-15', '12345678912', 'F', 'pessoalmente'),
(16, 'LUIZ FELIPE DALBELLO', '2002-05-27', '2023-09-15', '69696969691', 'M', 'pessoalmente'),
(17, 'CLEITTON FERREIRA DOS SANTOS', '2002-01-03', '2023-09-15', '12284373941', 'M', 'pessoalmente'),
(19, 'Marcelia', '1970-01-18', '2023-09-29', '11111111111', 'F', 'pessoalmente'),
(20, 'Patricia', '1970-01-18', '2023-09-29', '44444444444', 'F', 'pessoalmente'),
(21, 'Raquel', '1970-01-18', '2023-09-29', '66666666666', 'F', 'pessoalmente'),
(22, 'Rafael', '1970-01-18', '2023-09-29', '55555555555', 'M', 'pessoalmente'),
(23, 'Bruno', '1970-01-18', '2023-09-29', '33333333333', 'M', 'pessoalmente'),
(24, 'Adriele', '1970-01-18', '2023-09-29', '22222222222', 'F', 'pessoalmente'),
(25, 'Luiza', '1970-01-18', '2023-09-29', '77777777777', 'F', 'pessoalmente');

--
-- Acionadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `trg_Cliente_Dell` BEFORE DELETE ON `cliente` FOR EACH ROW BEGIN
	DELETE FROM fone WHERE id_cliente = OLD.id;
    DELETE FROM email WHERE id_cliente = OLD.id;
    DELETE FROM endereco WHERE id_cliente = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE `cor` (
  `id` int(11) NOT NULL,
  `desc_cor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id`, `desc_cor`) VALUES
(1, 'Branco'),
(2, 'Preto'),
(3, 'Prata'),
(4, 'Cromado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo` varchar(15) DEFAULT NULL
);

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`id`, `id_cliente`, `email`, `tipo`) VALUES
(3, 2, 'Matias.Bulacio@hotmail.com.br', 'pessoal'),
(4, 3, 'Marcio.Machado@gmail.com.br', 'pessoal'),
(5, 4, 'RUAN.ULRICH@hotmail.com.br', 'pessoal'),
(6, 5, 'SYDINEY.SILVA@gmail.com.br', 'pessoal'),
(7, 6, 'Matias.Bulacio@gmail.com.br', 'pessoal'),
(8, 7, 'Marcio.Machado@hotmail.com.br', 'pessoal'),
(9, 8, 'RUAN.ULRICH@gmail.com.br', 'pessoal'),
(10, 9, 'GABRIEL.FERREIRA@outlook.com.br', 'pessoal'),
(11, 10, 'LUCAS.CARLOS@gmail.com.br', 'pessoal'),
(12, 11, 'GUSTAVO.SOUZA@hotmail.com.br', 'pessoal'),
(13, 12, 'WESLLEY.ABREU@gmail.com.br', 'pessoal'),
(14, 13, 'EDUARDA.DEPETRIS@gmail.com.br', 'pessoal'),
(15, 14, 'FELIPE.RIBEIRO@hotmail.com.br', 'pessoal'),
(16, 15, 'MARIA.TRINDADE@gmail.com.br', 'pessoal'),
(17, 16, 'LUIZ.DALBELLO@gmail.com.br', 'pessoal'),
(18, 17, 'CLEITTON.SANTOS@gmail.com.br', 'pessoal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `id_cliente`, `logradouro`, `numero`, `complemento`, `cep`, `bairro`, `cidade`, `estado`, `tipo`) VALUES
(2, 2, 'Jacinto Pinto 1636', '1636', 'esquina', '81480330', 'Sitio Cercado', 'Curitiba', 'PR', 'residencial'),
(3, 3, 'Dr Muricy 9881', '9881', 'esquina', '80310000', 'Santa Quiteria', 'Curitiba', 'PR', 'residencial'),
(4, 4, 'Zacarias 3809', '3809', 'esquina', '81480330', 'Sitio Cercado', 'Curitiba', 'PR', 'residencial'),
(5, 5, 'Jacinto Pinto 3871', '3871', 'esquina', '80310000', 'Santa Quiteria', 'Curitiba', 'PR', 'residencial'),
(6, 6, 'Zacarias 2883', '2883', 'esquina', '81480330', 'Sitio Cercado', 'Curitiba', 'PR', 'residencial'),
(7, 7, 'Zacarias 7208', '7208', 'esquina', '80520390', 'Bom Retiro', 'Curitiba', 'PR', 'residencial'),
(8, 8, 'Jacinto Pinto 1154', '1154', 'esquina', '80520390', 'Bom Retiro', 'Curitiba', 'PR', 'residencial'),
(9, 9, 'Jacinto Pinto 5606', '5606', 'esquina', '80310000', 'Santa Quiteria', 'Curitiba', 'PR', 'residencial'),
(10, 10, 'Dr Muricy 1763', '1763', 'esquina', '81480330', 'Sitio Cercado', 'Curitiba', 'PR', 'residencial'),
(11, 11, 'Dr Muricy 4397', '4397', 'esquina', '81480330', 'Sitio Cercado', 'Curitiba', 'PR', 'residencial'),
(12, 12, 'Jacinto Pinto 9835', '9835', 'esquina', '80310000', 'Santa Quiteria', 'Curitiba', 'PR', 'residencial'),
(13, 13, 'Dr Muricy 6071', '6071', 'esquina', '86828000', 'Centro', 'Curitiba', 'PR', 'residencial'),
(14, 14, 'Dr Muricy 4809', '4809', 'esquina', '80310000', 'Santa Quiteria', 'Curitiba', 'PR', 'residencial'),
(15, 15, 'Zacarias 9358', '9358', 'esquina', '86828000', 'Centro', 'Curitiba', 'PR', 'residencial'),
(16, 16, 'Dr Muricy 7161', '7161', 'esquina', '80520390', 'Bom Retiro', 'Curitiba', 'PR', 'residencial'),
(17, 17, 'Jacinto Pinto 5884', '5884', 'esquina', '80310000', 'Santa Quiteria', 'Curitiba', 'PR', 'residencial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_filial` int(11) NOT NULL,
  `qt_estoque` int(11) NOT NULL
);

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `id_produto`, `id_filial`, `qt_estoque`) VALUES
(12, 3, 2, 100),
(13, 6, 2, 100),
(14, 8, 2, 100),
(15, 1, 2, 100),
(16, 2, 2, 100),
(17, 5, 2, 100),
(18, 7, 1, 100),
(19, 9, 2, 100),
(20, 10, 1, 100),
(21, 4, 2, 100),
(22, 11, 2, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE `filial` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
);

--
-- Extraindo dados da tabela `filial`
--

INSERT INTO `filial` (`id`, `nome`) VALUES
(1, 'centro'),
(2, 'Santa Quiteria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fone`
--

CREATE TABLE `fone` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `contato` varchar(50) NOT NULL
);

--
-- Extraindo dados da tabela `fone`
--

INSERT INTO `fone` (`id`, `id_cliente`, `numero`, `tipo`, `contato`) VALUES
(3, 2, '419666657565', 'pessoal', ''),
(4, 3, '419128103733', 'pessoal', ''),
(5, 4, '419233831130', 'pessoal', ''),
(6, 5, '419934976136', 'pessoal', ''),
(7, 6, '419524833099', 'pessoal', ''),
(8, 7, '419374261039', 'pessoal', ''),
(9, 8, '419620591375', 'pessoal', ''),
(10, 9, '419600222861', 'pessoal', ''),
(11, 10, '419431769651', 'pessoal', ''),
(12, 11, '419434626108', 'pessoal', ''),
(13, 12, '419943324544', 'pessoal', ''),
(14, 13, '419767117489', 'pessoal', ''),
(15, 14, '419540554690', 'pessoal', ''),
(16, 15, '419692234482', 'pessoal', ''),
(17, 16, '419421177161', 'pessoal', ''),
(18, 17, '419815125246', 'pessoal', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha`
--

CREATE TABLE `linha` (
  `id` int(11) NOT NULL,
  `desc_linha` varchar(50) NOT NULL
);

--
-- Extraindo dados da tabela `linha`
--

INSERT INTO `linha` (`id`, `desc_linha`) VALUES
(1, 'Economico'),
(2, 'Premium'),
(3, 'Luxuoso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `desc_marca` varchar(50) NOT NULL
);

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id`, `desc_marca`) VALUES
(1, 'Eletrolux'),
(2, 'Philips'),
(3, 'Philco'),
(4, 'Brastemp'),
(5, 'Sanyo'),
(6, 'Prosdocimo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `id` int(11) NOT NULL,
  `desc_modelo` varchar(100) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_linha` int(11) NOT NULL
);

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`id`, `desc_modelo`, `id_marca`, `id_linha`) VALUES
(7, '20 L', 2, 1),
(8, '15 L', 2, 3),
(9, '10 L', 3, 2),
(10, '10 L', 2, 3),
(11, '15 L', 2, 3),
(12, '15 L', 3, 3),
(13, '10 L', 2, 3),
(14, '15 L', 3, 3),
(15, '20 L', 3, 3),
(16, '20 L', 4, 1),
(17, '30 L', 5, 1),
(18, '20 L', 6, 1),
(19, '30 L', 3, 1),
(20, '20 L', 3, 1),
(21, '30 L', 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `id_cor` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `desc_produto` varchar(100) NOT NULL,
  `capacidade` float NOT NULL,
  `vlr_sugerido` float NOT NULL,
  `vlr_custo` float NOT NULL,
  `voltagem` varchar(10) NOT NULL,
  `image` varchar(255)
);

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `id_cor`, `id_modelo`, `desc_produto`, `capacidade`, `vlr_sugerido`, `vlr_custo`, `voltagem`) VALUES
(1, 3, 12, 'Produto', 20, 732.35, 803.7, '110 V'),
(2, 3, 13, 'Produto', 20, 1210.17, 636.93, '220 V'),
(3, 1, 9, 'Produto', 20, 1249.57, 657.67, '220 V'),
(4, 4, 14, 'Produto', 15, 1477.36, 777.56, '220 V'),
(5, 3, 9, 'Produto', 10, 1609.98, 847.36, '110 V'),
(6, 1, 9, 'Produto', 10, 748.57, 995.84, '220 V'),
(7, 3, 13, 'Produto', 15, 1267.59, 667.15, '110 V'),
(8, 1, 14, 'Produto', 15, 826.98, 989.48, '220 V'),
(9, 3, 14, 'Produto', 10, 672.98, 924.25, '220 V'),
(10, 3, 8, 'Produto', 15, 1474.42, 776.01, '220 V'),
(11, 4, 12, 'Produto', 20, 1259.49, 662.89, '110 V'),
(12, 1, 16, 'micoondas', 20, 550, 550, '220'),
(13, 3, 16, 'micoondas', 20, 550, 550, '220'),
(14, 2, 17, 'micoondas', 30, 500, 500, '220'),
(15, 3, 18, 'micoondas', 20, 600, 600, '220'),
(16, 3, 21, 'micoondas', 30, 600, 600, '220'),
(17, 1, 19, 'micoondas', 30, 430, 430, '220'),
(18, 3, 19, 'micoondas', 30, 420, 420, '220'),
(19, 1, 20, 'micoondas', 20, 333.33, 333.33, '220');

--
-- Acionadores `produto`
--
DELIMITER $$
CREATE TRIGGER `trg_Produto_Dell` BEFORE DELETE ON `produto` FOR EACH ROW BEGIN
	DECLARE existing_id INT;
	DECLARE custom_error CONDITION FOR SQLSTATE '45000';

    SELECT id INTO existing_id FROM venda_item WHERE id_produto = OLD.id LIMIT 1;

    IF existing_id IS NOT NULL THEN
		SIGNAL custom_error
            SET MESSAGE_TEXT = 'Tem vendas relacionadas a esse produto';
	ELSE 
		DELETE FROM estoque  WHERE id_produto = OLD.id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `data` date NOT NULL,
  `nr_documento` int(11) DEFAULT NULL,
  `status` char(20) NOT NULL,
  `prc_desconto` float NOT NULL
);

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `id_cliente`, `id_vendedor`, `data`, `nr_documento`, `status`, `prc_desconto`) VALUES
(1, 5, 10, '2023-09-17', NULL, 'complete', 0.1),
(2, 3, 10, '2023-09-17', NULL, 'complete', 0.1),
(3, 15, 4, '2023-09-17', NULL, 'complete', 0.1),
(4, 3, 9, '2023-09-17', NULL, 'complete', 0.1),
(6, 2, 17, '2023-09-17', NULL, 'complete', 0.1),
(7, 14, 1, '2023-09-17', NULL, 'complete', 0.1),
(8, 10, 3, '2023-09-17', NULL, 'complete', 0.1),
(9, 11, 6, '2023-09-17', NULL, 'complete', 0.1),
(10, 11, 5, '2023-09-17', NULL, 'complete', 0.1),
(11, 3, 5, '2023-09-17', NULL, 'complete', 0.1),
(12, 5, 6, '2023-09-17', NULL, 'complete', 0.1),
(13, 10, 4, '2023-09-17', NULL, 'complete', 0.1),
(14, 11, 1, '2023-09-17', NULL, 'complete', 0.1),
(15, 6, 4, '2023-09-17', NULL, 'complete', 0.1),
(16, 3, 5, '2023-09-17', NULL, 'complete', 0.1),
(17, 9, 4, '2023-09-17', NULL, 'complete', 0.1),
(18, 2, 2, '2023-09-17', NULL, 'complete', 0.1),
(19, 5, 5, '2023-09-17', NULL, 'complete', 0.1),
(20, 5, 6, '2023-09-17', NULL, 'complete', 0.1),
(21, 7, 4, '2023-09-17', NULL, 'complete', 0.1),
(22, 3, 12, '2023-09-17', NULL, 'complete', 0.1),
(23, 15, 16, '2023-09-17', NULL, 'complete', 0.1),
(32, 19, 19, '2023-08-01', NULL, 'complete', 0.1),
(33, 20, 18, '2023-08-01', NULL, 'complete', 0.1),
(41, 21, 19, '2023-08-02', NULL, 'complete', 0.1),
(43, 22, 20, '2023-08-02', NULL, 'complete', 0.1),
(49, 20, 18, '2023-08-02', NULL, 'complete', 0.1),
(53, 23, 18, '2023-08-03', NULL, 'complete', 0.1),
(54, 24, 19, '2023-08-04', NULL, 'complete', 0.1),
(55, 25, 20, '2023-08-04', NULL, 'complete', 0.1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_item`
--

CREATE TABLE `venda_item` (
  `id` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `vlr_venda` float NOT NULL,
  `qtd_vendas` int(11) NOT NULL,
  `status` char(20) DEFAULT NULL
);

--
-- Extraindo dados da tabela `venda_item`
--

INSERT INTO `venda_item` (`id`, `id_venda`, `id_produto`, `vlr_venda`, `qtd_vendas`, `status`) VALUES
(1, 20, 1, 1318.23, 2, 'complete'),
(2, 20, 1, 1318.23, 2, 'complete'),
(3, 20, 10, 3980.93, 3, 'complete'),
(4, 20, 11, 3400.63, 3, 'complete'),
(5, 21, 8, 826.98, 1, 'complete'),
(6, 22, 7, 4563.31, 4, 'complete'),
(7, 22, 6, 673.713, 1, 'complete'),
(8, 22, 11, 4534.17, 4, 'complete'),
(9, 23, 10, 1326.98, 1, 'complete'),
(10, 23, 8, 1488.56, 2, 'complete');

--
-- Acionadores `venda_item`
--
DELIMITER $$
CREATE TRIGGER `trg_venda_item_ins` AFTER INSERT ON `venda_item` FOR EACH ROW BEGIN
	UPDATE estoque 
    SET qt_estoque = qt_estoque - NEW.qtd_vendas WHERE id = NEW.id_produto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `nome_vendedor` varchar(100) NOT NULL,
  `data_admissao` date NOT NULL,
  `data_demissao` date DEFAULT NULL,
  `comissao` float NOT NULL
);

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`id`, `nome_vendedor`, `data_admissao`, `data_demissao`, `comissao`) VALUES
(1, 'SYDINEY LEANDRO DA SILVA', '2023-09-15', NULL, 8),
(2, 'Matias Julian Bulacio', '2023-09-15', NULL, 9),
(3, 'Marcio Machado', '2023-09-15', NULL, 6),
(4, 'RUAN LISBOA ULRICH', '2023-09-15', NULL, 3),
(5, 'SYDINEY LEANDRO DA SILVA', '2023-09-15', NULL, 14),
(6, 'Matias Julian Bulacio', '2023-09-15', NULL, 3),
(7, 'Marcio Machado', '2023-09-15', NULL, 15),
(8, 'RUAN LISBOA ULRICH', '2023-09-15', NULL, 12),
(9, 'GABRIEL ESPINDOLA FERREIRA', '2023-09-15', NULL, 9),
(10, 'LUCAS LUCIANO DUTRA CARLOS', '2023-09-15', NULL, 12),
(11, 'GUSTAVO BATISTA DE SOUZA', '2023-09-15', NULL, 11),
(12, 'WESLLEY CEZAR PROTSKI DE ABREU', '2023-09-15', NULL, 12),
(13, 'EDUARDA DEPETRIS', '2023-09-15', NULL, 4),
(14, 'FELIPE HENRIQUE RIBEIRO', '2023-09-15', NULL, 10),
(15, 'MARIA BEATRIZ WAGNER TRINDADE', '2023-09-15', NULL, 10),
(16, 'LUIZ FELIPE DALBELLO', '2023-09-15', NULL, 10),
(17, 'CLEITTON FERREIRA DOS SANTOS', '2023-09-15', NULL, 7),
(18, 'Maria', '2023-09-29', NULL, 5),
(19, 'Carlos', '2023-09-29', NULL, 5),
(20, 'Ghilherme', '2023-09-29', NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_vendas`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_vendas` (
`data` date
,`nome_vendedor` varchar(100)
,`qtd_vendas` int(11)
,`desc_produto` varchar(100)
,`capacidade` float
,`desc_cor` varchar(50)
,`vlr_venda` float
,`nome` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_vendas`
--
DROP TABLE IF EXISTS `vw_vendas`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_vendas`  AS SELECT `venda`.`data` AS `data`, `vendedor`.`nome_vendedor` AS `nome_vendedor`, `venda_item`.`qtd_vendas` AS `qtd_vendas`, `produto`.`desc_produto` AS `desc_produto`, `produto`.`capacidade` AS `capacidade`, `cor`.`desc_cor` AS `desc_cor`, `venda_item`.`vlr_venda` AS `vlr_venda`, `cliente`.`nome` AS `nome` FROM (((((`venda` left join `vendedor` on(`venda`.`id_vendedor` = `vendedor`.`id`)) left join `venda_item` on(`venda`.`id` = `venda_item`.`id`)) left join `produto` on(`venda_item`.`id_produto` = `produto`.`id`)) left join `cor` on(`produto`.`id_cor` = `cor`.`id`)) left join `cliente` on(`venda`.`id_cliente` = `cliente`.`id`))  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cor`
--
ALTER TABLE `cor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_email_ciente` (`id_cliente`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ESTOQUE_PRODUTO` (`id_produto`),
  ADD KEY `FK_ESTOQUE_FILIAL` (`id_filial`);

--
-- Índices para tabela `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fone`
--
ALTER TABLE `fone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_fone_cliente` (`id_cliente`);

--
-- Índices para tabela `linha`
--
ALTER TABLE `linha`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MODELO_MARCA` (`id_marca`),
  ADD KEY `FK_MODELO_LINHA` (`id_linha`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PRODUTO_COR` (`id_cor`),
  ADD KEY `FK_PRODUTO_MODELO` (`id_modelo`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_VENDA_CIENTE` (`id_cliente`),
  ADD KEY `FK_VENDA_VENDEDOR` (`id_vendedor`);

--
-- Índices para tabela `venda_item`
--
ALTER TABLE `venda_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_VENDA_ITEM_VENDA` (`id_venda`),
  ADD KEY `FK_PRODUTO_VENDA` (`id_produto`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cor`
--
ALTER TABLE `cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `filial`
--
ALTER TABLE `filial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fone`
--
ALTER TABLE `fone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `linha`
--
ALTER TABLE `linha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `venda_item`
--
ALTER TABLE `venda_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `FK_email_ciente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `FK_ESTOQUE_FILIAL` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`id`),
  ADD CONSTRAINT `FK_ESTOQUE_PRODUTO` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `fone`
--
ALTER TABLE `fone`
  ADD CONSTRAINT `FK_fone_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `FK_MODELO_LINHA` FOREIGN KEY (`id_linha`) REFERENCES `linha` (`id`),
  ADD CONSTRAINT `FK_MODELO_MARCA` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `FK_PRODUTO_COR` FOREIGN KEY (`id_cor`) REFERENCES `cor` (`id`),
  ADD CONSTRAINT `FK_PRODUTO_MODELO` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `FK_VENDA_CIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `FK_VENDA_VENDEDOR` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id`);

--
-- Limitadores para a tabela `venda_item`
--
ALTER TABLE `venda_item`
  ADD CONSTRAINT `FK_PRODUTO_VENDA` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `FK_VENDA_ITEM_VENDA` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id`);
COMMIT;