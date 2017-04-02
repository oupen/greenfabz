var cards = document.getElementsByClassName(gallerycard);
for(var i = 0; i < cards.length; i++){
    var target = Math.floor(Math.random() * cards.length -1) + 1;
    var target2 = Math.floor(Math.random() * cards.length -1) +1;
    console.log(target);
    cards.eq(target).before(cards.eq(target2));
}