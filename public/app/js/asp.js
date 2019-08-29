let asp = (function () {

    let props = {};

    function init(params) {

        getProperties(params);
        //console.log(props);
        switch (props.mode) {
            case 'index':
                aspIndex.init(props);
                break;

            case 'create':
                aspCreate.init(props);
                break;

            case 'edit':
                aspCreate.init(props);
                break;

            default:
                console.log("Sorry, we are out of.");
        }
    }

    let getProperties = function(items) {

        let stack = '';
        getProp(items, stack);

        function getProp(o, stack) {
            for (let [key, value] of Object.entries(o)) {
                if (typeof value === 'object') {
                    getProp(value, stack = key);
                } else {
                    if (stack) {
                        props[stack.substring(0, 3) + key.charAt(0).toUpperCase() + key.slice(1)] = value;
                    } else {
                        props[key] = value;
                    }
                }
            }
        }
    };

    return {
        init: init,
    }

})();