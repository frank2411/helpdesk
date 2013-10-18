function Confirm(obj){
  this.elementId;
  this.buttonTrue;
  this.buttonFalse;
  this.open;
  this.msg;
}

Confirm.Prepare = function(obj){
  var ConfirmBox = new Confirm();
  ConfirmBox.ConfirmPrepare(obj);
  return ConfirmBox;
}

Confirm.prototype.ConfirmPrepare = function(obj) {

  this.elementId = obj.elementId;
  this.buttonTrue = obj.buttonTrue;
  this.buttonFalse = obj.buttonFalse;
  this.open = obj.open;
  this.msg = obj.message;
  this.userChoise = false;
  this.onClose = obj.onClose;
  var self = this;

  this.bind = function(){
    this.elementBinded = document.getElementById(this.elementId);
    this.onclick();
  }

  this.openConfirm = function(){
    this.removeConfirm();
    var body = document.body;
    var confirmContainer = document.createElement("div");
    confirmContainer.className = "confirmContainer";
    confirmContainer.innerHTML = this.msg+"\
      <button data-confirm=\"yes\" >"+this.buttonTrue+"</button>\
      <button data-confirm=\"no\" >"+this.buttonFalse+"</button>";
    body.appendChild(confirmContainer);
    this.buttons = body.getElementsByTagName("button");
    this.addButtonsOnclick();
  }

  this.addButtonsOnclick = function(){
    for(var i=0;i<this.buttons.length;i++){
      if(this.buttons[i].hasAttribute("data-confirm")){
        if (this.buttons[i].addEventListener) {
          this.buttons[i].addEventListener("click",function(e){self.choice(self,e);},false);
        } else if (this.buttons[i].attachEvent) {
          this.buttons[i].attachEvent('onclick', function(){self.choice(self,e)});
        }
      }
    }
  }

  this.sendUserChoise = function(){
    console.log(this.userChoise);
    return this.userChoise;
  }


  this.choice = function(self,e){
    this.choiseMade = e.target.getAttribute("data-confirm");
    this.userChoise = this.choiseMade == "yes" ? true : false;
    this.removeConfirm();
    this.onClose();
  }

  //remove alredy opened confirm
  this.removeConfirm = function(){
    body = document.body;
    divs = body.getElementsByTagName("div");
    for (i = 0; i < divs.length ; i++) {
      if(divs[i].className == "confirmContainer"){
        divs[i].parentNode.removeChild(divs[i]);
      }
    }
  }

  this.onclick = function(){
    if (this.elementBinded.addEventListener) {
      this.elementBinded.addEventListener("click",function(e){self.openConfirm(self,e);},false);
    } else if (this.elementBinded.attachEvent) {
      this.elementBinded.attachEvent('onclick', function(){self.openConfirm(self)});
    }
  }

  this.bind();

};

//window.ConfirmBox = new Confirm();
