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
    drill(hash.substring(9));

  }
  // process home
  else if(hash.indexOf("#home") == 0)
  {
    applyFilter("*");
  }

});

$(window).hashchange();


// Load isotope to handle image grid transitions
$('#imagegrid').isotope({
  itemSelector : '.imagegridelement',
  masonry : {
        columnWidth : 210
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

// Animators
function applyFilter(selector)
{
  window.location.hash = "filter/" + selector;
  $('#imagegrid').isotope({ filter: selector });
  $('.detailview').fadeOut(500);
}

function removeImages()
{    
  $('#imagegrid').isotope({ filter: '#nothing'});
  $('.detailview').fadeIn(500);
}

function drill(project)
{
  removeImages();
  window.location.hash = "details/" + project;
}