var frmvalidator  = new Validator("register");

frmvalidator.EnableOnPageErrorDisplay();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("inputName","req","Please provide your name");

frmvalidator.addValidation("inputGmail","req","Please provide your email address");

frmvalidator.addValidation("inputGmail","email","Please provide a valid email address");

frmvalidator.addValidation("inputName","req","Please provide your name");

frmvalidator.addValidation("inputPassword","req","Please provide a password");