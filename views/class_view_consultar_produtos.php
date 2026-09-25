<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style_consultar_produtos.css">
        <title>Consultar Produtos</title>
    </head>

    <body>

        <h1>Produtos</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($aProdutos as $produto): ?>
                    <tr>
                        <td><?php echo $produto['codigo']; ?></td>
                        <td><?php echo $produto['descricao']; ?></td>
                        <td>
                            R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                        </td>
                        <td><?php echo $produto['quantidade']; ?></td>
                        <td>
                            //Essa ação de selecionar será implementada apenas quando a consulta de produtos for aberta pela view de inclusão de venda
                            <!--<button type="button">
                                Selecionar
                            </button>-->
                            <!-- Alterar -->
                            <form method="post"
                                  action="class_controller_produto.php"
                                  style="display: inline;">

                                <input type="hidden"
                                       name="acao"
                                       value="2">

                                <input type="hidden"
                                       name="codigo"
                                       value="<?php echo $produto['codigo']; ?>">

                                <button type="submit">
                                    Alterar
                                </button>

                            </form>

                            <!-- Excluir -->
                            <form method="post"
                                  action="class_controller_produto.php"
                                  style="display: inline;">

                                <input type="hidden"
                                       name="acao"
                                       value="3">

                                <input type="hidden"
                                       name="codigo"
                                       value="<?php echo $produto['codigo']; ?>">

                                <button type="submit">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>