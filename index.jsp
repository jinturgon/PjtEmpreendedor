<%@ page language="java" import="java.sql.*"  %>
<%@include file="conexao.jsp"%>

<%
    // prepara o comando para inserir 
    //
    String sql = "select * from Produtos;";

    // cria o objeto statement para executar o comando do sql
    Statement stm = conexao.createStatement() ;

    // executa o comando do sql
    ResultSet dados = stm.executeQuery(sql) ;
    
%>

<!DOCTYPE html>
<html>

<head>
  <title>General Pizzaria</title>
  <meta charset="utf-8">
  <link rel="icon" href="./include/img/logo.jpg" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
  <script src="./include/script.js"></script>
  <link href="./include/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <section name="header" id="header">
    <header id="home">
      <nav>
        <ul class="menu">
          <li><a href="#home" class="logo"></a></li>
          <li><a href="#home" class="link">Home</a></li>
          <li><a href="#about" class="link">Informa&ccedil;&otilde;es</a></li>
          <li><a href="#rate" class="link">Avaliar</a></li>
          <li><a href="#footer" class="link">Contate-nos</a></li>
        </ul>
      </nav>
    </header>
  </section>

  <section name="banner" id="banner">
    <div id="slideshow">
      <div style="background: url('./include/img/banner.jpg') no-repeat center; background-size: cover;">
      </div>
      <div
        style="background: url('./include/img/banner2.jpg') no-repeat center; background-size: cover; display: none;">
      </div>
      <div
        style="background: url('./include/img/banner3.jpg') no-repeat center; background-size: cover; display: none;">
      </div>
    </div>
  </section>

  <section name="about" id="about"><br>
    <!--o BR serve para que a ancora se alinhe com o Título-->
    <div class="container" style="margin-top:60px">
      <div class="row" style="align-items: center;">

        <div class="col">
          <hgroup class="section-title align-center">
            <h1>SOBRE O CARDAPIO</h1>
            <h2>Melhor Pizzaria em Guarulhos</h2>
          </hgroup>
        </div>

        <div class="w-100"></div>

        <div class="col-sm-12 col-lg-6">
          <div class="caixaA">
            <img src="./include/img/pizzasgif.gif">
          </div>
        </div>

        <div class="col-sm-12 col-lg-6">
          <div class="caixaB">
            <h1><strong>TAMANHOS E PRE&Ccedil;OS</strong></h1>
            <p>

              Pizza Tamanho Pequeno - 6 fatias | R$ 20,00<br>
              Pizza Tamanho M&eacute;dia - 8 fatias | R$ 30,00<br>
              Pizza Tamanho Grande - 10 fatias | R$ 37,00<br>
            </p>
            <h1><strong>SABORES</strong></h1>
            <p>Sucos de polpa: R$ 5,90 | (Laranja, Lim&atilde;o, Goiaba, Acerrola, Hortela etc..).<br>
              Refrigerante &agrave; partir de R$ 6,90 | (Coca-Cola, Pepsi, Fanta, Dolly).
              <br />
              Sabores de Pizzas: Mussarela, Calabresa, Margherita, Basca, Mafiosa, Br&oacute;colis c/ Catupiry, Alho e
              &Oacute;leo, Escarola, Bacon, Milho c/ Bacon, Saborosa, 5 Queijos, Napolitana,
              Anchovas, Portuguesa, Vegetariana, Lombo c/ Catupiry, Banana c/ Chocolate e 1 Bola de Sorvete de
              Creme.<br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section name="rate" id="rate"><br>
    <!--o BR serve para que a ancora se alinhe com o Título-->
    <div class="container" style="margin-top:60px">
      <div class="row" style="align-items: center;">

        <div class="col">
          <hgroup class="section-title align-center">
            <h1>FA&Ccedil;A UMA AVALIA&Ccedil;&Atilde;O</h1>
            <h2>Ajude-nos a melhorar o nosso servi&ccedilo</h2>
          </hgroup>
        </div>

        <div class="w-100"></div>

        <div class="col">


          <div class="form" id="form">
            <ul class="tab-group">
              <li class="tab active"><a href="#signup">Cadastrar</a></li>
              <li class="tab"><a href="#login">Logar</a></li>
            </ul>
            <div class="tab-content">
              <div id="signup">
                <h1>Registrar-se</h1>
                <form action="registrar.jsp" method="post" id="form_registro">
                  <div class="field-wrap">
                    <label>
                      CPF<span class="req">*</span>
                    </label>
                    <input type="text" required autocomplete="off" name="cpf" maxlength="25" />
                  </div>
                  <div class="top-row">
                    <div class="field-wrap">
                      <label>
                        Nome<span class="req">*</span>
                      </label>
                      <input type="text" required autocomplete="off" name="nome" maxlength="50"/>
                    </div>

                    <div class="field-wrap">
                      <label>
                        Telefone<span class="req">*</span>
                      </label>
                      <input type="text" required autocomplete="off" name="telefone" maxlength="13" />
                    </div>
                  </div>
                  <div class="field-wrap">
                    <label>
                      E-mail<span class="req">*</span>
                    </label>
                    <input type="email" required autocomplete="off" name="email" maxlength="55"/>
                  </div>
                  <div class="field-wrap">
                    <label>
                      Senha<span class="req">*</span>
                    </label>
                    <input type="password" required autocomplete="off" name="senha" maxlength="16"/>
                  </div>
                  <button type="submit" class="button button-block" form="form_registro">Continuar</button>
                </form>
              </div>

              <div id="login">
                <h1>Bem Vindo de Volta!</h1>
                <form action="logar.jsp" method="post" id="form_login">
                  <div class="field-wrap">
                    <label>
                      CPF<span class="req">*</span>
                    </label>
                    <input type="text" required autocomplete="off" name="cpf" maxlength="25"/>
                  </div>
                  <div class="field-wrap">
                    <label>
                      Senha<span class="req">*</span>
                    </label>
                    <input type="password" required autocomplete="off" name="senha" maxlength="16" />
                  </div>
                  <!--<p class="forgot"><a href="#">Esqueceu a Senha?</a></p>-->
                  <button type="submit" class="button button-block" form="form_login">Continuar</button>
                </form>
              </div>
            </div>
          </div>


          <div class="form" id="cad_comentario" style="display: none;">
            <ul class="tab-group">
              <li class="tab active"><a href="#comentar">Comentar !</a></li>
              <li class="tab"><a onclick="window.location.href='logoff.jsp'">Deslogar !</a></li>
            </ul>
            <div class="tab-content">
              <div id="comentar">
                <h1>Enviar Avalia&ccedil;&atilde;o</h1>

                <form action="comentar.jsp" method="post" id="form_comentar">

                  <div class="field-wrap">
                    <label>
                      Nota<span class="req">*</span>
                    </label>
                    <div class='rating-stars text-center'>
                      <ul id='stars'>
                        <li class='star' title='Pessimo' data-value='1'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='Justo' data-value='2'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='Bom' data-value='3'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='Excelente' data-value='4'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='WOW!!!' data-value='5'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                      </ul>
                      <label class="error" for="nota" id="nota_error" style="display: inline;">O campo NOTAS &eacute;
                        obrigat&oacute;rio.</label>
                    </div>
                    <div>
                      <input type="radio" value="1" name="nota" data-nota-id="1">
                      <input type="radio" value="2" name="nota" data-nota-id="2">
                      <input type="radio" value="3" name="nota" data-nota-id="3">
                      <input type="radio" value="4" name="nota" data-nota-id="4">
                      <input type="radio" value="5" name="nota" data-nota-id="5">
                    </div>
                  </div>

                  <div class="field-wrap">
                    <label class="active">
                      CPF
                    </label>
                    <input type="text" required autocomplete="off" name="cpf" disabled
                      value="<% out.println(session.getValue("loginUsuario")); %>" maxlength="25">
                  </div>

                  <div class="field-wrap">
                    <label>
                      Assunto<span class="req">*</span>
                    </label>
                    <input type="text" required autocomplete="off" name="assunto" maxlength="55" />
                  </div>

                  <div class="field-wrap">
                    <div id="text">
                      <label>
                        Mensagem<span class="req">*</span>
                      </label>
                      <textarea required autocomplete="off" name="texto" maxlength="255"></textarea>
                    </div>
                  </div>


                  <div class="field-wrap">
                    <div id="recom">
                      <label class="active">
                        Recomenda<span class="req">*</span>
                      </label>
                      <select name="recomenda" required>
                        <option value=null>Nenhuma</option>
                        <%
                      while (dados.next() && (session.getValue("loginUsuario") != null  || session.getValue("senhaUsuario") != null)) {
                        out.print("<option value='"+dados.getString("prod_id")+"'>"+dados.getString("prod_categoria")+" "+dados.getString("prod_nome")+"</option>");
                      }
                      %>
                      </select>
                    </div>
                  </div>


                  <button type="submit" class="button button-block" form="form_comentar">Comentar!</button>

                </form>

              </div>
            </div>
          </div>


          <script src="./include/scriptstar.js"></script>
          <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
          <script src="./include/scriptform.js"></script>
        </div>

      </div>
  </section>

  <section name="footer" id="footer"><br>
      <!--o BR serve para que a ancora se alinhe com o T&iacute;tulo-->
      <div class="full-bg-image" style="background-position: center 49px;"></div>
      <div class="container" style="margin-top:60px">
        <div class="row" style="align-items: center;">
          <div class="col">
            <hgroup class="section-title align-center">
              <h1>Contatos</h1>
              <h2>Entre em contato. Teremos prazer em atend&ecirc;-lo!</h2>
            </hgroup>
          </div>

          <div class="w-100"></div>

          <div class="col-md-6">
            <div class="widget">
              <ul class="contact-details" style="font-size:20px;color:#fff;font-weight: bold">
                <li><a href="tel:11981113261" style="font-size:20px;color:#fff;font-weight: bold">FA&Ccedil;A SEU
                    PEDIDO:<br>(11) 9 8111-3261</a></li>
              </ul>
            </div>
            <div class="widget">
              <ul style="font-size:20px;color:#fff;font-weight: bold">
                <li>R. Proc&oacute;pio Ferreira, 126 - Jardim Scyntila - Guarulhos/SP</li>
                <li>Altura da Av. Ot&aacute;vio Braga de Mesquita</li>
              </ul>
            </div>
            <div class="widget">

              <ul class="social-icons">
                <a href="https://www.facebook.com/216233831915857/" target="_blank">
                  <img src="./include/img/facebook.png" width="32" height="32"></a>
              </ul>
              <!--/ .social-icons-->
            </div>
          </div>
          <div class="col-md-6" style="padding-left: 3px;">
            <div class="widget">
              <font color="#ccc"><span style="font-size:20px;color:#fff;font-weight: bold;">Hor&aacute;rio de
                  Funcionamento</span><br><br>
                <div class="col-sm-12 col-lg-12" style="padding-left: 0;">
                  <table>
                    <thead>
                      <tr>
                        <th>Dia</th>
                        <th>Hor&aacute;rio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Segunda</td>
                        <td>Fechado</td>
                      </tr>
                      <tr>
                        <td>Ter&ccedil;a</td>
                        <td>11h30 &agrave;s 23h</td>
                      </tr>
                      <tr>
                        <td>Quarta</td>
                        <td>11h30 &agrave;s 23h</td>
                      </tr>
                      <tr>
                        <td>Quinta</td>
                        <td>11h30 &agrave;s 23h</td>
                      </tr>
                      <tr>
                        <td>Sexta</td>
                        <td>11h30 &agrave;s 00h</td>
                      </tr>
                      <tr>
                        <td>S&aacute;bado</td>
                        <td>12h &agrave;s 00h</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </font>

            </div>
          </div>
        </div>
      </div>
    <div class="bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="copyright">USO EDUCACIONAL - 2019 - FEITO POR ALUNOS DA FACULDADE ENIAC</div>
            <!--/ .cppyright-->
          </div>
        </div>
      </div>
    </div>
  </section>

  <%
    if(session.getValue("loginUsuario") != null || session.getValue("senhaUsuario") != null){

      %><script>
      (function () {
        $('div#form').hide();
        $('div#cad_comentario').show();
      })();
    </script><%
    } else {
      
      %><script>
      (function () {
        $('div#cad_comentario').hide();
      })();
    </script><%
      
    }
  %>


</body>

</html>