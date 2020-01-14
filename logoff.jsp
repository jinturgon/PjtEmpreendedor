<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <title>Sistema de Deslogar :: JSP</title>
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
<%
//Destroi as sessions
session.invalidate();
%>
<script>
    alert("Voc\u00ea foi desconectado! Iremos te redirecionar para a p\u00e1gina principal.");
    document.location.href='index.jsp'; //Exibe um código javascript para redireionar ao painel
</script>
</body>

</html>