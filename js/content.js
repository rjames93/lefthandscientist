function embedPDF(){

    var myPDF = new PDFObject({url: 'cv.pdf', pdfOpenParams: { zoom: '50' }}).embed('pdfcontainer'); 

    // Be sure your document contains an element with the ID 'pdfcontainer' 
}

$(document).load(function(){
    $("ul.nav.masthead-nav").load("navbar.php").delay(10);
    
    $("div.inner.cover:visible").load("content.php",{request: $("li.active")});
});

$(document).ready(function(){

    if (window.jQuery) {  
    // jQuery is loaded  
    //alert("jQuery loaded");
    } else {
    // jQuery is not loaded
    //alert("jQuery not loaded");
    }



    $("ul.nav.masthead-nav").load("navbar.php");
    $("div.inner.cover").load("content.php",{request: $("li.active").text()});
    $(document).ajaxSuccess( function() {
        $("a#navigation").click(function(){
            if($(this).parent().hasClass("active")){
                console.log($(this).text());
            } else {
                console.log($(this).text());
                $("div.inner.cover:hidden").load("content.php",{request: $(this).text(),s_page: $(this).text()});
                $("div.inner.cover:hidden").addClass("ready");
                $("div.inner.cover:visible").slideToggle();
                $("li.active").removeClass("active");
                $("div.inner.cover.ready").slideToggle();
                $(this).parent().addClass("active");
                $("div.inner.cover,ready:visible").removeClass("ready");
            };
        })
        //embedPDF();
    })
});
