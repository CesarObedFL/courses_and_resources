$(function () {

    // menu items
    var menuItems = [{ caption: 'Automobile', icon: 'auto' }, { caption: 'Cafe', icon: 'cafe' }, { caption: 'Construction', icon: 'construction' }, { caption: 'Education', icon: 'education' },
    { caption: 'Fainance', icon: 'fainance' },
    { caption: 'Food Court', icon: 'food' }, { caption: 'Furniture', icon: 'furniture' }, { caption: 'Home & Garden', icon: 'home' },
    { caption: 'Medical', icon: 'medical' },
    { caption: 'Sport & Outdoor', icon: 'sport' }, { caption: 'Technologies', icon: 'technology' }, { caption: 'Travel', icon: 'travel' },
    { caption: 'Wedding', icon: 'wedding' }];

    var viewModel = function () {
        this.menuItems = ko.observableArray(menuItems);
    }

    ko.bindingHandlers.cssIcon = {
        init: function (element, valueAccessor, allBindingsAccessor, viewModel, bindingContext) {
            element.className = valueAccessor() + ' ' + element.className;

        }
    };

    ko.applyBindings(new viewModel());
});