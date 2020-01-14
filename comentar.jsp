<%@ page language="java" import="java.sql.*"  %>
<%@include file="conexao.jsp"%>
<%
    String assunto_form = request.getParameter("assunto"); // Pega o Nome vindo do formulário
    String texto_form = request.getParameter("texto"); // Pega o Telefone vindo do formulário
    
    String nota_form = request.getParameter("nota"); // Pega a opção vindo do formulário

    String recomenda_form = request.getParameter("recomenda"); // Pega a recomendação vindo do formulário

    // prepara o comando para inserir 
    //
    String sql = "INSERT INTO Comentario (com_cliente, com_assunto, com_texto, com_datahora, com_nota, com_recomenda) VALUES ('"+session.getValue("loginUsuario")+"','"+assunto_form+"','"+texto_form+"', CURRENT_TIMESTAMP, '"+nota_form+"',"+recomenda_form+");";
    // cria o objeto statement para executar o comando do sql
    Statement stm = conexao.createStatement() ;

    // executa o comando do sql
    stm.executeUpdate(sql) ;
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

    <head>
        <title>Sistema de Comentarios :: JSP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" href="./include/img/logo.jpg" type="image/x-icon">
        <style>
            body,
            td,
            a:link,
            a:visited {
                font-family: Verdana;
                font-size: 10px;
                color: #000000;
                text-decoration: none;
            }

            a:hover {
                color: #FF0000;
            }

            input {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 10px;
                background-color: #FFFFFF;
                border: 1px solid #000000;
            }
        </style>
    </head>

    <body>
        <script>
            alert("Seu coment\u00e1rio foi cadastrado com sucesso! Iremos te redirecionar para a p\u00e1gina principal.");
            document.location.href='index.jsp'; //Exibe um código javascript para redireionar ao painel
        </script>
    </body>
</html>






