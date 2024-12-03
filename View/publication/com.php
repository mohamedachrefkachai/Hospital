<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="style-starter.css">
    <style>
      
      .btn {
        color : white !important;
        background-color : #42b883 !important;
        border-radius: 10px !important;
      }
      .btn:hover {
        color : cyan !important;
        box-shadow: 1px 1px 1px 1px cyan !important;
        animation: shake 2s;

      }
    input:active:hover, input:focus:hover, input:hover , input:active , input:focus ,textarea:active:hover, textarea:focus:hover, textarea:hover , textarea:active , textarea:focus{  
      border-color: #42b883 !important;
    }

    </style>
  </head>

  <body>
  
  <!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
     <script src ="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
     <link rel="stylesheet" href="Style.css">
    <title>Gestion pub</title>
    <link rel="icon" href="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" sizes="64x64">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                
                                <style>
                                   @font-face { font-family: Arial !important; font-display: swap !important; }
                                </style>
                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                <style>
                               
    

#clicked{
    padding-top: 1px;
    padding-bottom: 1px;
    text-align: center;
    width: 100%;
    background-color: #00a372;
    border-color: white;
    color: black ;
    border-width: 1px;
    border-style: solid;
    border-radius: 13px; 
}



#post{
    margin: 10px;
    padding: 6px;
    padding-top: 2px;
    padding-bottom: 2px;
    text-align: center;
    background-color: #00a372;
    border-color: #cccccc;
    color: black;
    border-width: 1px;
    border-style: solid;
    border-radius: 13px;
    width: 50%;
}

body{
    background-color: #cccccc;
}




.comments{
    margin-top: 5%;
    margin-left: 20px;
}








h1{
    color: black;
    font-weight: bold;
}
h4{
    color: white;
    font-weight: bold;
}

.error-message {
    color: red;
    font-size: 0.8em;
    margin-top: 0.2em;
  }



.form-group input,.form-group textarea{
    background-color: black;
    border: 1px solid rgba(16, 46, 46, 1);
    border-radius: 12px;
}

form{
    
    background-color: #42b883;
    border-radius: 5px;
    padding: 20px;
 }</style>
                                </head>
                           
                                <body class="snippet-body">
    <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2" style="background-color: #42b883">
        
           
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="end">
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav">

                   
                    
                </ul>
            </div>
        </div>
    </nav>

<!-- publication form -->
<section class="w3l-contacts-2" id="contact">
	<div class="contacts-main">
		<div class="form-41-mian py-5">
			<div class="container py-md-3">
        
				<h3 style ="color: #42b883"class="cont-head">Contenu Publication : </h3>
				 <div class="d-grid align-form-map">
					<div class="form-inner-cont">
						
						<form action="addpublication.php" method="POST" class="main-input">
							<div class="top-inputs d-grid">
								<input type="text" placeholder="Nom " name="name" id="w3lName" required="">
							</div>
							<textarea placeholder="Message" name="message" id="w3lMessage" required=""></textarea>
							<div >
								<center><button type="submit" class="btn" >Ajouter</button></center>
							</div>
						</form>

					</div>
					
					<div class="contact-right">
						<img src="logo_abir.png" class="img-fluid" alt="">
					</div>
				</div>
			</div>
		</div>
		

</section>


                 
</body>

</html>



