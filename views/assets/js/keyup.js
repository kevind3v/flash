$(() => {
  $('.name').on('keyup', () => {
    var data = $('.name').val();
    $('.card-title').html(data);
  });
  $('.price').on('keyup', () => {
    var data = $('.price').val();
    $('.card-price .price').html(data);
  });
});
