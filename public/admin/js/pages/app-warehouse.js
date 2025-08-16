$(function () {
  'use strict';

  var applyChangesBtn = $('.btn-apply-changes'),
    discount,
    tax1,
    tax2,
    discountInput,
    tax1Input,
    tax2Input,
    sourceItem = $('.source-item'),
    date = new Date(),
    datepicker = $('.date-picker'),
    dueDate = $('.due-date-picker'),
    select2 = $('.warehouseto'),
    countrySelect = $('#customer-country'),
    btnAddNewItem = $('.btn-add-new');

  // init date picker
  if (datepicker.length) {
    datepicker.each(function () {
      $(this).flatpickr({
        enableTime: true,
        allowInput: true,
        dateFormat: "Y-m-d H:i:s",
        // defaultDate: date
      });
    });
  }

  if (dueDate.length) {
    dueDate.flatpickr({
      enableTime: true,
      allowInput: true,
      dateFormat: "Y-m-d H:i:s",
      // defaultDate: new Date(date.getFullYear(), date.getMonth(), date.getDate() + 5)
    });
  }

  // Country Select2
  if (countrySelect.length) {
    countrySelect.select2({
      placeholder: 'Select country',
      dropdownParent: countrySelect.parent()
    });
  }

  // Close select2 on modal open
  $(document).on('click', '.add-new-customer', function () {
    select2.select2('close');
  });

  // Select2
  if (select2.length) {
    select2.select2({
      placeholder: 'Chon khách hàng',
      dropdownParent: $('.warehouse-customer')
    });

    select2.on('change', function () {
      var $this = $(this),
        renderDetails =
          '<div class="customer-details mt-1">' +
          '<p class="mb-25">' +
          $('option:selected', $this).attr('data-full-name') +
          '</p>' +
          '<p class="mb-25">' +
          $('option:selected', $this).attr('data-phone'); +
          '</p>' +
          '<p class="mb-25">' +
          $('option:selected', $this).attr('data-email') +
          '</p>' +
          '</div>';
      $('.row-bill-to').find('.customer-details').remove();
      $('.row-bill-to').find('.col-bill-to').append(renderDetails);
    });

    // select2.on('select2:open', function () {
    //   if (!$(document).find('.add-new-customer').length) {
    //     $(document)
    //       .find('.select2-results__options')
    //       .before(
    //         '<div class="add-new-customer btn btn-flat-success cursor-pointer rounded-0 text-start mb-50 p-50 w-100" data-bs-toggle="modal" data-bs-target="#add-new-customer-sidebar">' +
    //           feather.icons['plus'].toSvg({ class: 'font-medium-1 me-50' }) +
    //           '<span class="align-middle">Thêm mới một customer</span></div>'
    //       );
    //   }
    // });
  }

  // Repeater init
  if (sourceItem.length) {
    sourceItem.on('submit', function (e) {
      e.preventDefault();
    });
    sourceItem.repeater({
      show: function () {
        $(this).slideDown();
      },
      hide: function (e) {
        $(this).slideUp();
      }
    });
  }

  // Prevent dropdown from closing on tax change
  $(document).on('click', '.tax-select', function (e) {
    e.stopPropagation();
  });

  // On tax change update it's value
  function updateValue(listener, el) {
    listener.closest('.repeater-wrapper').find(el).text(listener.val());
  }

  // Apply item changes btn
  if (applyChangesBtn.length) {
    $(document).on('click', '.btn-apply-changes', function (e) {
      var $this = $(this);
      tax1Input = $this.closest('.dropdown-menu').find('#tax-1-input');
      tax2Input = $this.closest('.dropdown-menu').find('#tax-2-input');
      discountInput = $this.closest('.dropdown-menu').find('#discount-input');
      tax1 = $this.closest('.repeater-wrapper').find('.tax-1');
      tax2 = $this.closest('.repeater-wrapper').find('.tax-2');
      discount = $('.discount');

      if (tax1Input.val() !== null) {
        updateValue(tax1Input, tax1);
      }

      if (tax2Input.val() !== null) {
        updateValue(tax2Input, tax2);
      }

      if (discountInput.val().length) {
        var finalValue = discountInput.val() <= 100 ? discountInput.val() : 100;
        $this
          .closest('.repeater-wrapper')
          .find(discount)
          .text(finalValue + '%');
      }
    });
  }

  // Item details select onchange
  // $(document).on('change', '.item-details', function () {
  //   var $this = $(this),
  //     value = adminDetails[$this.val()];
  //   if ($this.next('textarea').length) {
  //     $this.next('textarea').val(value);
  //   } else {
  //     $this.after('<textarea class="form-control mt-2" rows="2">' + value + '</textarea>');
  //   }
  // });
  if (btnAddNewItem.length) {
    btnAddNewItem.on('click', function () {
      if (feather) {
        // featherSVG();
        feather.replace({ width: 14, height: 14 });
      }
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      console.log(tooltipTriggerList);
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });
    });
  }
});