<%@ page language="java" import="java.sql.*"  %>
<%@include file="conexao.jsp"%>

<%

    String login_form = request.getParameter("cpf"); // Pega o Login vindo do formulário
    String senha_form = request.getParameter("senha"); //Pega a senha vinda do formulário

    // prepara o comando para selecionar 
    String sql = "select * from Cliente where cl_cpf = '"+login_form+"' and cl_senha = '"+senha_form+"';" ;

    Statement stm = conexao.createStatement() ;

    ResultSet dados = stm.executeQuery( sql ) ;

%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <title>Sistema de Login :: JSP</title>
    <link rel="icon" href="./include/img/logo.jpg" type="image/x-icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <%

        if( dados.next() ) {
            session.putValue("loginUsuario", dados.getString("cl_cpf")); //Grava a session com o Login
            session.putValue("senhaUsuario", dados.getString("cl_senha")); //Grava a session com a Senha
            
            %>
            <script>
                alert("O Login foi efetuado com sucesso! Iremos te redirecionar para a p\u00e1gina principal.");
                document.location.href='index.jsp'; //Exibe um código javascript para redireionar ao painel
            </script>
            <%
        } else { //Se estiverem incorretos...
            %>
            <script>
                alert("Os dados estavam incorretos ou n\u00e3o existe uma conta com esses dados. Tente novamente ou efetue o cadastro na tela inicial! Redirecionando...");
                document.location.href='index.jsp'; //Exibe um código javascript para redireionar ao painel
            </script>
            <%
        }

    %>
</body>

</html>