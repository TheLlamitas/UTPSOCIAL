// Initialization for ES Users
import {
    Tab,
    initTE,
  } from "tw-elements";
  
  initTE({ Tab });

  $(document).ready(function () {
      $('.openModal').on('click', function(e){
          $('#interestModal').removeClass('invisible');
      });
      $('.closeModal').on('click', function(e){
          $('#interestModal').addClass('invisible');
      });
  });
