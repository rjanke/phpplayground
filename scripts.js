var coolSites = new Vue({
    el: '#cool-sites',
    data: {
        coolSiteList: [],
        dataLoaded: false,
        liveUpdates: false,
        isLoading: false,
        updateFrequency: 1000,
        buttonText: 'get live updates',
        exampleText: 'Some text here'
    },
    methods: {
        getSitesAuto: function () {
            setTimeout(function () {
                this.getSitesAjax()
            }.bind(this), this.updateFrequency);
        },
        getSitesAjax: function () {
            if (this.liveUpdates == false) {
                this.buttonText = 'get live updates'
            }

            $.ajax({
                context: this,  // access 'this' context in ajax function
                url: "/sitesJSON.php",
                type: "GET",
                dataType: "json",
                success: function (data) {
                  this.dataLoaded = true;
                  this.coolSiteList = data;
                },
                complete: function () {
                  if (this.liveUpdates == true) {
                    this.isLoading = false;
                    this.buttonText = 'live';
                    this.getSitesAuto()
                  } 
                }.bind(this)   // access 'this' inside function
              });
        }
    },
    mounted: function () {
        // Populate the temp data on initial page load
        this.$nextTick(function () {
            this.getSitesAjax()
        });
    }
})


var buttonExample = new Vue ({
    el: '.button-example',
    data: {
        buttonText: 'my button'
    },
    methods: {
        changeButtonText: function () {
            this.buttonText = 'new text';
        }
    }
})