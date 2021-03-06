<html>
<head>
	<title></title>
	 <!-- <link href="css/main.css" type="text/css" rel="stylesheet" /> -->
	 <style>
	 	* {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

body { font-family: sans-serif; }

.masonry {
  background: #EEE;
  max-width: 1240px;
}

.masonry .item {
  float: left;
}

/* item is invisible, but used for layout */
.item,
.item-content {
  width: 200px;
  height: 200px;
}

.item {
  border: none;
  background: transparent;
}

/* item-content is visible, and transitions size */
.item-content {
  width: 200px;
  height: 200px;
  background: #AB9;
  border: 2px solid #333;
  border-color: hsla(0, 0%, 0%, 0.5);
  border-radius: 5px;
  -webkit-transition: width 0.4s, height 0.4s;
     -moz-transition: width 0.4s, height 0.4s;
       -o-transition: width 0.4s, height 0.4s;
          transition: width 0.4s, height 0.4s;
          z-index:10000000000000000000000000000;
}

.item:hover .item-content {
  border-color: white;
  background: #AB7;
  cursor: pointer;

}

/* both item and item content change size */
.item.is-expanded,
.item.is-expanded .item-content {
  width: 300px;
  height: 500px;
}

.item.is-expanded {
  z-index: 2;
}

.item.is-expanded .item-content {
  background: #BCd;
}

 </style>
</head>
<body>
	
	<h1>Masonry - animate item size with vanilla JS</h1>
<div class="masonry">
  <div class="item">
    <div class="item-content" id="cont1">
    </div>
  </div>
  <div class="item">
    <div class="item-content" id="cont2"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
  <div class="item">
    <div class="item-content"></div>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="bower_components/masonry/dist/masonry.pkgd.js"></script>
	<script src="bower_components/classie/classie.js"></script>
	<script>
		// external js
		// http://masonry.desandro.com/masonry.pkgd.js
		// http://masonry.desandro.com/bower_components/classie/classie.js

            $(document).ready(function(){
                $.ajaxSetup ({
                    cache: false
                }); 
                var ajax_load = "<img src='images/ajax/loader.gif' alt='loading...' />";

            //  load() functions
                var loadUrl = "index.php";
                $("#cont1").click(function(){
                    $("#cont1").html(ajax_load);
                     $.get(
                        loadUrl,
                        function(responseText){
                            //$("#cont1").html(responseText);
                            alert($(responseText).find("meta[name='description']").attr("content"));
                         //  alert($(responseText).find("meta").attr("name"));
//                          var tes = $.parseHTML(responseText);
//                            $.each( tes, function( i, el ) {                              
//                                    alert(el.nodeName);                                
//                            });
                        },
                        "html"
                    );
               //  $("#cont1").html(ajax_load).load(loadUrl.attr);
              
                });
                
            });

            docReady( function() {

              var container = document.querySelector('.masonry');
              var msnry = new Masonry( container, {
                columnWidth: 30,
                isFitWidth: true

              });

              eventie.bind( container, 'click', function( event ) {
                // don't proceed if item content was not clicked on
                var target = event.target;
               if ( !classie.has( target, 'item-content' )  ) {
                  return;
                }
                var itemElem = target.parentNode;
                classie.toggleClass( itemElem, 'is-expanded' );

                msnry.layout();
              });

            });
	</script>
</body>
</html>