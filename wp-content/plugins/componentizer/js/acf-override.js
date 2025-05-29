

jQuery(document).ready(function($){
  if ( $("#acf-group_58b5af69f1375").length > 0 ){

    var pageSectionsContainer = $("#acf-group_58b5af69f1375");
    var orderHandle = $(".acf-field-58b5af9b017d8 table.acf-table:first > tbody > tr > .order")
    $(".acf-field-58b5af9b017d8 table.acf-table:first > tbody > tr > .acf-row-handle").hide(); //hide all actions
    var pageSections = $(".acf-field-58b5af9b017d8");
    var pageSectionRowsSelectorString = ".acf-field-58b5af9b017d8 .acf-table:first > tbody > .acf-row";

    var pageSectionRows;
    initPageSections();

    var componentTypes = [];
    pageSections.find('[data-event="add-row"]:last').hide();


    pageSectionRows.last().find('select:first option').each(function(){
      componentTypes.push({
        name: $(this).val(),
        displayName: $(this).html()
      });
    })

    prepComponentTitles();

    $(".page-component").hide();

    pageSectionsContainer.find('.acf-input:first').prepend("<div id='componentsTop' style='margin-bottom: 20px'></div>")
    pageSectionsContainer.find('.acf-input:first').append("<div id='componentsBottom'></div>")

    $("#componentsTop").parents('.acf-field').find('.acf-label:first').remove();
    var reorderButtonsHtml = "<a href='#' class='admin-only component-link button button-primary' id='reorderBtn' rel='reorder' style='display: inline-block; margin-bottom: 10px'>Reorder Components</a><a href='#' class='component-link button button-primary' id='endReorderBtn' rel='end-reorder' style='display: none'>End Reorder</a>";
    $("#componentsTop").append(reorderButtonsHtml);

    $("#componentsBottom").append("<div class='admin-only' id='newComponentForm' style='border: 1px solid #DDD; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 5px #1B85BA; margin-top: 30px'><h3 style='margin: 0'>Add New Component</div>")
    $("#newComponentForm").append("<br /><strong>Component Title</strong><br /><input id='newComponentTitle' placeholder='' style='width: 100%'><br />");
    $("#newComponentForm").append("<br /><strong>Component Type</strong><br /><select id='newComponentType'></select><br />");
    for ( var i in componentTypes ){
      $("#newComponentType").append("<option value='"+componentTypes[i].name+"'>"+componentTypes[i].displayName+"</option>")
    }
    $("#newComponentForm").append("<br /><a href='#' class='component-link button button-primary' rel='new'>Create New</a><br />");


    $(".component-link").on('click',function(){
      var componentKey = $(this).attr('rel');
      if ( componentKey == 'new' ){
        $(".page-component").fadeOut(100);
        resetEditLinks();
        pageSections.find('[data-event="add-row"]:last').click();
        var newPageSection = $(pageSectionRowsSelectorString).not('.acf-clone').last();
        initPageSections();
        newPageSection.find('input:first').val($("#newComponentTitle").val());
        newPageSection.find('select:first').val($("#newComponentType").val()).change();
        $("#newComponentTitle, #newComponentType").val('')
        prepComponentTitles();
        $(".component-edit:last").hide().siblings('.component-edit-done, .component-delete').show();
        setTimeout(function(){
          newPageSection.find('input:first').focus();
        },100)
        //alert(pageSections.find('.acf-table:first > tbody > .acf-row').not('.acf-clone').length);
      }
      else if ( componentKey == 'show-all' ){
        $(".page-component").each(function(){
          $(this).fadeIn();
          $(this).find('.acf-fields:first > .acf-field').fadeIn();
          orderHandle.hide();
        })
      } else if ( componentKey == 'reorder' ){
        $(".section-title-container").remove();

        $(".page-component").each(function(){
          $(this).find('.acf-fields:first > .acf-field').not(":first").fadeOut(200);
        });

        setTimeout(function(){
          $(".page-component").fadeIn();
          var orderCount = 0;
          $(".page-component > .order").each(function(){
            orderCount++;
            $(this).html('<span>'+orderCount+'</span').show();
          })
          orderHandle.show();
        },200)

        $("#reorderBtn").hide();
        $("#endReorderBtn").show();
      } else if ( componentKey == 'end-reorder' ){
        $(".page-component").hide();
        orderHandle.hide();
        $(".page-component").find('.acf-fields:first > .acf-field').fadeIn();
        $("#reorderBtn").show();
        $("#endReorderBtn").hide();
        prepComponentTitles();
      } else if ( componentKey == 'hide-all' ){
        $(".page-component").hide();
      } else {
        $(".page-component").hide();
        components[componentKey].fadeIn();
      }
    })


    function prepComponentTitles(){
      $(".section-title-container").remove();
      pageSectionRows.not(".acf-clone").each(function(){
        componentTitle = $(this).find('.acf-field:first input:first').val();
        $(this).before('<tr class="section-title-container"><td><div style="float: left"><h3 style="margin: 0; line-height: 28px" class="section-title">'+componentTitle+'</h3></div> <div style="float: right"><a href="#" class="admin-only component-delete button button-primary" style="display: none">Delete</a>&nbsp;&nbsp;<a href="#" class="component-edit button button-primary">Edit</a><a href="#" class="component-edit-done button button-primary" style="display: none">Done</a></div></td></tr>');
      })

      $(".component-edit").off('click').on('click',function(){
        resetEditLinks();
        $(".page-component").hide();
        $(this).siblings('.component-edit-done, .component-delete').show();
        $(this).hide();
        var sectionTitleContainer = $(this).parents('.section-title-container');
        var componentToShow = sectionTitleContainer.next('.page-component');
        componentToShow.fadeIn()
        componentToShow.find('input:first').focus().on('change keyup paste',function(){
          sectionTitleContainer.find('.section-title').html($(this).val());
        });
      })

      $(".component-edit-done").off('click').on('click',function(){
        $(".page-component").hide();
        $(this).siblings('.component-edit').show();
        $(this).siblings('.component-delete').hide();
        $(this).hide();
      })

      $(".component-delete").off('click').on('click',function(){
        if ( confirm("Are you sure you want to delete this component?")) {
          $(this).parents('.section-title-container').next('.page-component').find('[data-event="remove-row"]:last').click();
          $(this).parents('.section-title-container').remove();
        }
      })
    }

    function initPageSections(){
      pageSectionRows = $(".acf-field-58b5af9b017d8 .acf-table:first > tbody > .acf-row");
      pageSectionRows.not(".acf-clone").each(function(){
        $(this).removeClass('page-component').addClass('page-component');
      })
    }

    function resetEditLinks(){
      $(".component-edit").each(function(){
        $(this).show().siblings('.component-edit-done, .component-delete').hide();
      })
    }

  }
})
