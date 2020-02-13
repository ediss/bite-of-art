var Autocomplete = {
    
    initialize: function(){
        this.initializeEvents();
    },
    initializeEvents: function(){
        var self = this;
        $('js-autocomplete').each(function(_,elem){
            // not used for now, idea is to retrieve autocomplete from API
            var url = $(elem).attr('data-url');
            self.setAutocomplete($(elem), null, url)
        });
    },
    setAutocomplete: function(autocomplete_elem, data, field, search_url){
        var self = this;
        var source = null;
        if (data) {
            // predefined data to autocomplete 

            if (typeof field !== "undefined"){
                source =  self.extractFieldFromData(data, field);
            }
            else{
                source = data;
            }

        }
        else{
            // data retrieved from ajax call
            source= function (request, response) {
                var term = request.term.trim();

                $.ajax({
                    method: 'POST',
                    url: self.search_url + term,
                    success: function (data) {
                        var skills = [];
                        $.each(data, function (i, item) {
                            if (item.name.toLowerCase().indexOf(term.toLowerCase()) != -1) {
                                var label = item.name.substr(0, term.length) + item.name.substr(term.length);
                                skills.push({label: label, value: item.id});
                            }
                        });
                        response(skills.slice(0, 30));
                    }
                });
            }
        }
        
        autocomplete_elem.autocomplete({
            minLength: 3,
            source: source
        });
    },
    extractFieldFromData: function(data, field){
        var extracted = [];
        $.each(data, function(_,elem){
            extracted.push(elem[field]);
        });
        return extracted;
    }
}
