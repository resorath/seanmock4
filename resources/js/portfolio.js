// Hover fix for mobile
if ('ontouchstart' in document) {
    $('body').removeClass('no-touch');
}

// Navigation
if(window.location.hash == "")
  window.location.hash = "#home";

$(window).hashchange( function(){
  var hash = window.location.hash;
  // process filters
  if(hash.indexOf("#filter/") == 0)
  {
    applyFilter(hash.substring(8));

  }
  // process details
  if(hash.indexOf("#details/") == 0)
  {
    //drill(hash.substring(9));

  }
  // process home
  else if(hash.indexOf("#home") == 0)
  {
    applyFilter("*");
  }

});

$(window).hashchange();

var colWidth = $('.imagegridelement > img#standard').outerWidth() + ($('.imagegridelement').css('margin').replace(/[^-\d\.]/g, '') * 2);

// mobile hack
if(colWidth > 160)
  colWidth = '105';

// Load isotope to handle image grid transitions
$('#imagegrid').isotope({
  itemSelector : '.imagegridelement',
  masonry : {
        columnWidth : colWidth
      },
});

// Event handling

// filter items when filter link is clicked
$('#filters button').click(function(){
  var selector = $(this).attr('data-filter');
  applyFilter(selector);
  return false;
});

// Drill into a project when clicked
$('.imagegridelement').click(function(){
  drill($(this).attr('id'))
})

$('.imagegridelement').hover(function() {

   $('.imagegridelement').not(this).each(function(){
       $(this).fadeTo(0.2, 0.5);
   });
}, function() {
   $('.imagegridelement').each(function(){
       $(this).fadeTo(0.2, 1);
   });
});

/*
$('.imagegridelement').hover(function(){
   $(this).children('img').animate({ height: $(this).height()*1.05, width: $(this).width()*1.05 }, "fast");
   $(this).animate({left: "-=5", top: "-=5"}, "fast");
}, function() {
   $(this).children('img').animate({ height: $(this).height()*(1/1.05), width: $(this).width()*(1/1.05) }, "fast");
   $(this).animate({left: "+=5", top: "+=5"}, "fast");
})*/

// Change the masonry columns on resize to match the smallest image (instead of the default first image)
$(window).resize(function(){

  $('#imagegrid').isotope({
    masonry: {
      columnWidth: colWidth
    }
  });

});

// Animators

var inDetailViewContext = false;
var inFancyBoxView = false;
var lastfilter = null;
var loaderHtml = null;

function applyFilter(selector)
{
  window.location.hash = "filter/" + selector;
  $('#imagegrid').isotope({ filter: selector });
  $('.detailview').fadeOut(500);
  lastfilter = window.location.hash.substring(8);
  inDetailViewContext = false;
  $('html, body').animate({
    backgroundColor: '#FFFFFF'
  }, 1000);
  $('#detailview').html(loaderHtml);

}

function removeImages()
{    
  $('#imagegrid').isotope({ filter: '#nothing'});
  $('.detailview').fadeIn(500);
}

function drill(project)
{
  loaderHtml = $('#detailview').html();
  /*$.get('details.php?project=' + project, function(data){
    $('#detailview').html(data);
  })*/
  $('#detailview').load('details.php?project=' + project, function(response, status, xhr)
  {
    if(status == "success")
    {
      $('.fancybox').fancybox({
          beforeLoad: function() {
            inFancyBoxView = true;
          },
          afterClose: function() {
            inFancyBoxView = false;
          }


      });
    }
    if(status == "error")
    {
        $('#detailview').html('<div class="holdon">Sorry, I wanted to show you some details but couldn\'t due to a problem :(</div>');
    }
  });
  removeImages();
  window.location.hash = "details/" + project;
  inDetailViewContext = true;
  $('html, body').animate({
    backgroundColor: '#CCCCCC'
  }, 1000);

}


// drill out on click outside the window
// Note: we only want to do this in the detail view context, but not within a fancy box
$(document).mouseup(function (e)
{
    var container = $(".detailview");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
      if(inDetailViewContext && !inFancyBoxView)
      {
        if(lastfilter != null)
          applyFilter(lastfilter);
        else
          applyFilter("*");
      }
    }
});