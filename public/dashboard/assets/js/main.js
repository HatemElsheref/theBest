

function removeElement(msg,ok,cancel,formId) {
    swal({
        // text: "...Do You Sure To Remove This Row",
        text: msg,
        buttons: [cancel,ok] ,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                let form=$('#remove-element');
                let url=form.data('url')+'/'+formId;
                // console.log(url);
              form.attr('action',url).submit();
            }
        });
}
