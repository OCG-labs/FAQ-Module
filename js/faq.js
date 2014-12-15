/*child.js*/

jQuery(document).ready(function($) {
  $('#accordion .panel-collapse').on('shown.bs.collapse', function() {
    $(this).prev().find(".indicator").addClass('fa-caret-down').removeClass('fa-caret-right');
  });

  $('#accordion .panel-collapse').on('hidden.bs.collapse', function() {
    $(this).prev().find(".indicator").addClass('fa-caret-right').removeClass('fa-caret-down');
  });
});
