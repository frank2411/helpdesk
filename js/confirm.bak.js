function Modal(options){
  if(this === window){
    var Modal = new ModalObj(options);
    return Modal;
  }
}

function ModalObj(options){
  this.id = options.id;
  this.class = options.class;
  this.message = options.message;
  this.html = options.html;
  this.bindedElm;
  this.eventToBind = "click";
  this.onclose = options.onClose;
  this.width = options.width;
  this.height = options.height;
  //this.onopen = options.onOpen;
  this.insertNodeValue = options.insertNodeValue;
  this.elmValue;
  this.Init();
}

ModalObj.prototype.Init = function() {

  var body = document.body;
  var self = this;

  this.open = function(self,e){
    this.startELm = e.target;
    this.setNodeValue();
    this.removeModal();
    var modalHtml = document.createElement("div");
    modalHtml.className = "modal modal-container modal-traditional";
    var pMsg = document.createElement("p");
    pMsg.className = "modal-title";
    pMsg.innerHTML = this.message;
    modalHtml.appendChild(pMsg);
    
    if(this.html){
      /* ==== HACK TO INCLUDE ALL CUSTOM HTML IN MODAL WINDOW LIKE JQUERY .APPEND() ==== */
      var temp = document.createElement("temp");
      temp.innerHTML = this.html;
      temp = temp.childNodes;
      var fragment = document.createDocumentFragment();
      for(i = 0; i < temp.length; i++){
        var clone = temp[i].cloneNode(true);
        fragment.appendChild(clone);      
      }
      modalHtml.appendChild(fragment);
    }

    var divButtons = document.createElement("div");
    divButtons.innerHTML = "<button data-confirm=\"yes\" >Ok</button>\
                            <button data-confirm=\"no\" >No</button>";
    modalHtml.appendChild(divButtons);
    this.bindButtonEvent(divButtons);
    body.appendChild(modalHtml);
    this.calculateSizes(modalHtml);//give custom size to modal
  }

  this.buttonsActions = function(self,e){
    this.removeModal();
    this.clickedButton = e.target;
    this.choise = this.clickedButton.getAttribute("data-confirm");
    this.onclose(this.startELm);
  }

  this.removeNode = function(){
    this.startELm.parentNode.removeChild(this.startELm);
  }

  this.removeModal = function(){
    divs = body.getElementsByTagName("div");
    for (i = 0; i < divs.length ; i++) {
      if(divs[i].className == "modal modal-container modal-traditional"){
        divs[i].parentNode.removeChild(divs[i]);
      }
    }
  }

  this.bind = function(){
    if(this.id){
      this.bindedElm = document.getElementById(this.id);
      this.bindIdEvent();
    } else if(this.class){
      this.bindendElements = document.querySelectorAll("."+this.class);
      this.bindClassEvent();
    }
  }

  this.bindClassEvent = function(){
    for(i = 0; i < this.bindendElements.length;i++){
      this.bindendElements[i].onclick = function(e){self.open(self,e);};
    }
  }

  this.bindIdEvent = function(){
    if(this.bindedElm.addEventListener) {
      this.bindedElm.addEventListener('click', function(e){self.open(self,e);}, false);
    } else if(this.bindedElm.attachEvent) {
      this.bindedElm.attachEvent('onclick', function(e){self.open(self,e);});
    }
  }

  this.bindButtonEvent = function(divButtons){
    var buttons = divButtons.getElementsByTagName("button");
    for(i = 0; i < buttons.length;i++){
      buttons[i].onclick = function(e){self.buttonsActions(self,e);};
    }
  }

  this.calculateSizes = function(modalHtml) {

    if(this.width){
      var marginLeft = Math.abs(this.width / 2 );
    } else {
      var width = modalHtml.offsetWidth;
      var marginLeft = Math.abs(width / 2 );
    }

    if(this.height){
      var marginTop = Math.abs(this.height / 2 );;
    } else {
      var height = Math.abs(modalHtml.offsetHeight);
      var marginTop = Math.abs(height / 2 );
    }

    modalHtml.style.marginLeft = (-marginLeft+"px");
    modalHtml.style.marginTop = (-marginTop+"px");
    modalHtml.style.width = this.width+"px";
    modalHtml.style.height = this.height+"px";
    modalHtml.style.visibility = "visible";
  }

  this.setNodeValue = function(){
    this.elmValue = this.startELm.innerHTML;
  }

  this.getNodeValue = function(){
    return this.elmValue;
  }
  
  this.bind();


}