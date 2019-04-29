function carouselJS() {
    var $div = $('.carDiv'),
        indexdiv = $div.length - 1,
        i = 0,
        $currentdiv = $div.eq(i);

    $div.hide();
    $currentdiv.show();


    $('.next').click(function(){
        i++;

        if( i <= indexdiv ){
            $div.hide();
            $currentdiv = $div.eq(i);
            $currentdiv.show('fade', 500);
        }
        else{
            i = indexdiv;
        }
    });

    $('.prev').click(function(){
        i--;

        if( i >= 0 ){
            $div.hide();
            $currentdiv = $div.eq(i);
            $currentdiv.show('fade', 500);
        }
        else{
            i = 0;
        }
    });


    var $div2 = $('.carDiv2'),
        indexdiv2 = $div2.length - 1,
        i2 = 0,
        $currentdiv2 = $div2.eq(i);

    $div2.hide();
    $currentdiv2.show();


    $('.next2').click(function(){
        i2++;

        if( i2 <= indexdiv2 ){
            $div2.hide();
            $currentdiv2 = $div2.eq(i2);
            $currentdiv2.show('fade', 500);
        }
        else{
            i2 = indexdiv2;
        }
    });

    $('.prev2').click(function(){
        i2--;

        if( i2 >= 0 ){
            $div2.hide();
            $currentdiv2 = $div2.eq(i2);
            $currentdiv2.show('fade', 500);
        }
        else{
            i2 = 0;
        }
    });

}

