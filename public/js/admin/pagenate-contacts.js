$(function(){
  $('#diary-all-pager').pagination({
    dataSource: contacts,
    locator: 'items',
    totalNumberLocator: function(response) {
        // you can return totalNumber by analyzing response content
        return Math.floor(Math.random() * (1000 - 100)) + 100;
    },
    pageSize: 5,
    ajax: {
        beforeSend: function() {
            dataContainer.html('Loading data ...');
        }
    },
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
  })

  function template(dataArray) {
    return dataArray.map(function(data) {
      return '<li class="list">'
      + '<p class="name">' + data.name + '</p>'
      + '<p class="contact_category_id">' + data.contact_category_id + '</p>'
      + '<p class="mail">' + data.mail + '</p>'
    })
  }
});
