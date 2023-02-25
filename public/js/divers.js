$( document ).ready(function() {
    console.log("Hello World");

    /* Page Connexion */
        /* Menu burger */
    $('.page-login .header button.menu-burger-open').on('click', function(){
        $('.page-login .header .menu-burger').addClass('active');
        // console.log('Open menu burger');
    });
    $('.page-login .header .menu-burger button.menu-burger-close').on('click', function(){
        $('.page-login .header .menu-burger').removeClass('active');
        // console.log('Close menu burger');
    });
        /* Barre de recherche */
    $('.page-login .header .menu-burger .menu-burger-search input').keydown(function(event){
        if(event.which == 13){
            event.preventDefault();
            // console.log('Nouvelle recherche...');
            let url = "/search/" + $(this).val();
            // console.log(url);
            document.location.href = url;
        }
    });
    /* Page Register */
        /* Menu burger */
    $('.page-register .header button.menu-burger-open').on('click', function(){
        $('.page-register .header .menu-burger').addClass('active');
        // console.log('Open menu burger');
    });
    $('.page-register .header .menu-burger button.menu-burger-close').on('click', function(){
        $('.page-register .header .menu-burger').removeClass('active');
        // console.log('Close menu burger');
    });
        /* Barre de recherche */
    $('.page-register .header .menu-burger .menu-burger-search input').keydown(function(event){
        if(event.which == 13){
            event.preventDefault();
            // console.log('Nouvelle recherche...');
            let url = "/search/" + $(this).val();
            // console.log(url);
            document.location.href = url;
        }
    });

    /* Template général */
        /* Barre de recherche */
    $('#search').submit(function(e){
        e.preventDefault();
        window.location.href = "/search/" + e.target.elements[1].value;
        // console.log(e.target.elements[1].value);
    });
        /* Menu profil */
    $('.user .preview-user').on('click', function(){
        if($('.user .menu-user').hasClass('active')){
            $('.user .menu-user').removeClass('active');
            $('.user .preview-user i').css('transform', 'rotate(0deg)');
        }else{
            $('.user .menu-user').addClass('active');
            $('.user .preview-user i').css('transform', 'rotate(-90deg)');
        }
    });

        /* Page INDEX */
            // Sliders
    $('.slider-new-books').slick({
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1
    });
    $('.slider-famous-users').slick({
        dots: true,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1
    });
    $('.slider-new-users').slick({
        dots: true,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1
    });
    $('.slider-famous-categories').slick({
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1
    });
    
        /* Page USER SETTINGS */        
        $(".field-profil-image input").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('.field-profil-image .profilImg_preview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
        $(".field-banner-image input").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('.field-banner-image .bannerImg_preview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });

        /* Page EDIT BOOK PREVIEW */        
        $(".field-book-couverture-image input").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('.field-book-couverture-image .imageCouverture_preview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
function viewCategory(categoryName = ""){
    window.location.href = "/category/" + categoryName;
}
function viewBook(bookID = ""){
    window.location.href = "/book/" + bookID;
}
function viewUser(userPseudo = ""){
    window.location.href = "/user/" + userPseudo;
}