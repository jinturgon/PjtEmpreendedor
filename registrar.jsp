<%@ page language="java" import="java.sql.*"  %>
<%@include file="conexao.jsp"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <title>Sistema de Registro :: JSP</title>
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
	
    String login_form = request.getParameter("cpf"); // Pega o Login vindo do formulário
    String nome_form = request.getParameter("nome"); // Pega o Nome vindo do formulário
    String telefone_form = request.getParameter("telefone"); // Pega o Telefone vindo do formulário
    String email_form = request.getParameter("email"); // Pega o E-mail vindo do formulário
    String senha_form = request.getParameter("senha"); //Pega a senha vinda do formulário

    // prepara o comando para inserir 
    //
    String sql = "select * from Cliente where cl_cpf = '"+login_form+"'";

    // cria o objeto statement para executar o comando do sql
    Statement stm = conexao.createStatement() ;

    // executa o comando do sql
    ResultSet dados = stm.executeQuery(sql) ;
    

    if( !dados.next() ) {
        String sqlinsert = "INSERT INTO Cliente (cl_cpf, cl_nome, cl_telefone, cl_email, cl_senha) VALUES ('"+login_form+"','"+nome_form+"','"+telefone_form+"','"+email_form+"','"+senha_form+"');";
        
        // cria o objeto statement para executar o comando do sql
        Statement stminsert = conexao.createStatement() ;
    
        // executa o comando do sql
        stminsert.executeUpdate(sqlinsert) ;

        session.setAttribute("loginUsuario", login_form); //Grava a session com o Login
        session.setAttribute("senhaUsuario", senha_form); //Grava a session com a Senha
        %>
        <script>
            alert("Voc\u00ea foi cadastrado com sucesso! Iremos te redirecionar para a p\u00e1gina principal.");
            document.location.href='index.jsp'; //Exibe um código javascript para redireionar ao painel
        </script>
    <%
    } else {
    %>
        <script>
            alert("Voc\u00ea j\u00e1 esta registrado! Fa\u00e7a o Login ou Insira um CPF diferente.");
            document.location.href='index.jsp'; //Exibe um código javascript para redireionar ao painel
        </script>
    <%
    }
%>
</body>
</html>





