// window.onload = function(){
    
//     }

// }
var boyX=[-690,-363,-50];
var girlX=[-42.5,-378,-720];
var i=0;
var j=0;
var flag1=1;
var flag2=1;
sexual='boy';
var degree=0;
var degree1=0
function imgTouchStart(evt)
{
    // alert(1);
    evt.preventDefault();
    degree1=degree+degree1; 
    imgTouches = evt.touches; 
    imgLeft = id('photo').offsetLeft;
    imgTop = id('photo').offsetTop;

    imgWidth = id('photo').offsetWidth;
    imgHeight = id('photo').offsetHeight;  
    if(imgTouches.length == 1)
    {
        startX = Number(imgTouches[0].pageX); 
        startY = Number(imgTouches[0].pageY);
    }
    else if(imgTouches.length == 2)
    {

        var touch1 = imgTouches[0]; 
        sx1 = Number(touch1.pageX); 
        sy1 = Number(touch1.pageY);
        var touch2 = imgTouches[1]; 
        sx2 = Number(touch2.pageX); 
        sy2 = Number(touch2.pageY);

    }
}
function imgTouchMove(evt)
{
    //alert(imgLeft);
    evt.preventDefault();
    if(imgTouches.length == 1)
    {   //移动
        var touch = evt.touches[0]; 
        var x = Number(touch.pageX); 
        var y = Number(touch.pageY);
        //id('content-img').style.webkitTransform = 'translate('+ (x - startX) +'px,' + (y - startY) + 'px)';
        id('photo').style.left = imgLeft + x - startX;
        id('photo').style.top = imgTop + y - startY;
    }
    else if(imgTouches.length == 2)
    {   //缩放
        var touch1 = evt.touches[0]; 
        var ex1 = Number(touch1.pageX); 
        var ey1 = Number(touch1.pageY);
        var touch2 = evt.touches[1]; 
        var ex2 = Number(touch2.pageX); 
        var ey2 = Number(touch2.pageY);
        
        var slen = Math.abs(sx1-sx2);
        var elen = Math.abs(ex1-ex2);
        
        id('photo').style.backgroundSize = (elen-slen)/500+100+'%';
        id('photo').style.width = elen/slen*imgWidth + 'px';
        id('photo').style.height = elen/slen*imgHeight + 'px';
        id('photo').style.left = imgLeft + (1-elen/slen)*imgWidth/2+'px';
        id('photo').style.top = imgTop + (1-elen/slen)*imgHeight/2+'px';
        //旋转
        var sang = Math.atan((sy1-sy2)/(sx1-sx2));
        var eang = Math.atan((ey1-ey2)/(ex1-ex2));
        //if (Math.abs(sang-eang)>Math.PI/12)
        {
            // if ((sang<0)&&(sy1-sy2>0))//2
            //     {sang=Math.PI+sang;
            //     console.log('2s'+sang);}
            // else if ((sang>0)&&(sy1-sy2<0))//3
            //    { sang=Math.PI+sang;
            //     console.log('3s'+sang);}
            // else if ((sang<0)&&(sy1-sy2<0))//4
            //     {sang=2*Math.PI+sang;
            //     console.log('4s'+sang);}

            // if ((eang<0)&&(ey1-ey2>0))//2
            //     {eang=Math.PI+eang;
            //     console.log('2e'+eang);}
            // else if ((eang>0)&&(ey