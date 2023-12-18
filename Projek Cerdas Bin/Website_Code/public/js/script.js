$(function(){
    console.log("tukarpoint")
    $('.tukarPoin').on('click', function(){
        const id_item = $(this).data('item-id');
        const nim = $(this).data('nim');
        const point = $(this).data('point');
        console.log(id_item);
        console.log(nim);
        console.log(point);
    });
});