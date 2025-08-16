/*=========================================================================================
    File Name: data-list-view.js
    Description: List View
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function() {
  "use strict"
  // init list view datatable
  var dataListView = $(".data-list-view").DataTable({
    responsive: false,
    columnDefs: [
      {
        orderable: true,
        targets: 0,
        checkboxes: { selectRow: true }
      }
    ],
    dom:
      '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
    oLanguage: {
      sLengthMenu: "_MENU_",
      sSearch: ""
    },
    aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
    select: {
      style: "multi"
    },
    order: [[0, "desc"]],
    bInfo: false,
    pageLength: 4,
    buttons: [
      {
        text: "<i class='feather icon-plus'></i> Thêm Mới",
        action: function() {
          $(this).removeClass("btn-secondary")
          $(".add-new-data").addClass("show")
          $(".overlay-bg").addClass("show")
          $("#data-name, #data-price").val("")
          $("#data-category, #data-status").prop("selectedIndex", 0)
        },
        className: "btn-outline-primary btn-success"
      }
    ],
    initComplete: function(settings, json) {
      $(".dt-buttons .btn").removeClass("btn-secondary")
    }
  });

  dataListView.on('draw.dt', function(){
    setTimeout(function(){
      if (navigator.userAgent.indexOf("Mac OS X") != -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
      }
    }, 50);
  });

  // init thumb view datatable
  var dataThumbView = $(".data-thumb-view").DataTable({
    responsive: false,
    columnDefs: [
      {
        orderable: true,
        targets: 0,
        checkboxes: { selectRow: true }
      }
    ],
    dom:
      '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
    oLanguage: {
      sLengthMenu: "_MENU_",
      sSearch: ""
    },
    aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
    select: {
      style: "multi"
    },
    order: [[0, "desc"]],
    bInfo: false,
    pageLength: 10,
    buttons: [
      {
        text: "<i class='feather icon-plus'></i> Thêm mới",
        action: function() {
          $( '#form-add-popup-left form').trigger("reset");
          
          $('#form-add-popup-left [type="submit"]').text("Thêm mới");;
          $(this).removeClass("btn-secondary")
          $("#form-add-popup-left .add-new-data").addClass("show")
          $("#form-add-popup-left .overlay-bg").addClass("show")
        },
        className: "btn-outline-primary btn-success"
      }
    ],
    initComplete: function(settings, json) {
      $(".dt-buttons .btn").removeClass("btn-secondary")
    },
    drawCallback: function( settings ) {
      
      // Scrollbar
      if ($(".data-items").length > 0) {
        new PerfectScrollbar(".data-items", { wheelPropagation: false })
      }

      // Close sidebar
      $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
        $(".add-new-data").removeClass("show")
        $(".overlay-bg").removeClass("show")
        $("#data-name, #data-price").val("")
        $("#data-category, #data-status").prop("selectedIndex", 0)
      })

      // On Edit
      $('.action-edit').on("click",function(e){
        e.stopPropagation();
        var dataParrent = $(this).closest('td.product-action');
        
        dataParrent.find( 'input[type="hidden"]').each(function(  ) {
          
          if($('#form-update-popup-left [name="'+$(this).attr('name')+'"]').length) {
            $('#form-update-popup-left [name="'+$(this).attr('name')+'"]').val($(this).val());
          }
        });
        $('#form-update-popup-left [type="submit"]').val('edit').text("Sửa");
        $("#form-update-popup-left .add-new-data").addClass("show");
        $("#form-update-popup-left .overlay-bg").addClass("show");
      });

        // On Edit
        $('.action-edit-two').on("click",function(e){
          e.stopPropagation();
          var dataParrent = $(this).closest('td.product-action');
          
          dataParrent.find( 'input[type="hidden"]').each(function(  ) {
            
            if($('#form-add-popup-left [name="'+$(this).attr('name')+'"]').length) {
              $('#form-add-popup-left [name="'+$(this).attr('name')+'"]').val($(this).val());
            }
          });
          $('#form-add-popup-left [type="submit"]').val('edit').text("Sửa");
          $("#form-add-popup-left .add-new-data").addClass("show");
          $("#form-add-popup-left .overlay-bg").addClass("show");
        });


      // On Delete
      $('.action-delete').on("click", function(e){
        e.stopPropagation();
        
        var dataParrent = $(this).closest('td.product-action');

        // add id form delete
        var idUser = dataParrent.find( 'input[type="hidden"][name="id"]').val();
        var urlForm = $('#form-delete-popup-left form').attr('urlAction');
        $('#form-delete-popup-left form').attr('action',urlForm+'/'+idUser);
        dataParrent.find( 'input[type="hidden"]').each(function(  ) {
          if($('#form-delete-popup-left [name="'+$(this).attr('name')+'"]').length) {
           
            $('#form-delete-popup-left [name="'+$(this).attr('name')+'"]').val($(this).val());
          }
        });

        $("#form-delete-popup-left .add-new-data").addClass("show");
        $("#form-delete-popup-left .overlay-bg").addClass("show");
      });

      // dropzone init
      // Dropzone.options.dataListUpload = {
      //   complete: function(files) {
      //     var _this = this
      //     // checks files in class dropzone and remove that files
      //     $(".actions .dt-buttons").on(
      //       "click",
      //       function() {
      //         $(".dropzone")[0].dropzone.files.forEach(function(file) {
      //           file.previewElement.remove()
      //         })
      //         $(".dropzone").removeClass("dz-started")
      //       }
      //     )
      //   }
      // }
      // Dropzone.options.dataListUpload.complete()

      // mac chrome checkbox fix
      if (navigator.userAgent.indexOf("Mac OS X") != -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
      }
  }
  })

  dataThumbView.on('draw.dt', function(){
    setTimeout(function(){
      if (navigator.userAgent.indexOf("Mac OS X") != -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
      }
    }, 50);
  });

  // To append actions dropdown before add new button
  var actionDropdown = $(".actions-dropodown")
  actionDropdown.insertBefore($(".top .actions .dt-buttons"))


})
