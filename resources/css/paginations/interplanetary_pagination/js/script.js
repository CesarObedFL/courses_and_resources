// Declarations
const pagination = document.querySelector('.pagination-block');
const navigation = pagination.querySelector('nav');
const btn_prev = navigation.querySelector('.prev');
const btn_next = navigation.querySelector('.next');
const systems = navigation.querySelectorAll('.system');
const spaceship = navigation.querySelector('.spaceship');

// Moving the spaceship to the currently active system
move_the_spaceship(get_current_system_order(get_current_system()));

function get_current_system_order(system) {
    return parseInt(system.dataset.order);
}

function change_current_system(order, direction) {
    switch (direction) {
        case 'next':
            const next_order = order + 1;
            activate_current_system(next_order);
            move_the_spaceship(next_order);
            deactivate_current_system(order);
            break
        case 'prev':
            const prev_order = order - 1;
            activate_current_system(prev_order);
            move_the_spaceship(prev_order);
            deactivate_current_system(order);
            break
        default:
            const current = get_current_system();
            activate_current_system(order);
            move_the_spaceship(order);
            deactivate_current_system(parseInt(current.dataset.order));

    }
}

function get_current_system() {
    return navigation.querySelector('[aria-current="true"]');
}

function activate_current_system(order) {
    const system = navigation.querySelector(`[data-order='${order}']`);
    system.ariaCurrent = true;
}

function deactivate_current_system(order) {
    const system = navigation.querySelector(`[data-order='${order}']`);
    system.ariaCurrent = null;
}

function disable_arrow(arrow) {
    arrow.ariaDisabled = true;
}

function enable_arrow(arrow) {
    arrow.ariaDisabled = false;
}


function handle_navigation_controls() {
    const current = get_current_system();
    const current_order = parseInt(current.dataset.order);

    if (current_order > 1) {
        enable_arrow(btn_next);
    }
    if (current_order < systems.length) {
        enable_arrow(btn_prev);
    }
    if (current_order === systems.length) {
        disable_arrow(btn_next);
    }
    if (current_order === 1) {
        disable_arrow(btn_prev);
    }
}

function show_next() {
    const current = get_current_system();
    const current_order = parseInt(current.dataset.order);
    if (current_order < systems.length) {
        change_current_system(current_order, 'next');
    }
    handle_navigation_controls();
}


function show_previous() {
    const current = navigation.querySelector('[aria-current="true"]');
    const current_order = parseInt(current.dataset.order);
    if (current_order > 1) {
        change_current_system(current_order, 'prev');
        enable_arrow(btn_next);
    }
    handle_navigation_controls();
}

function show_selected() {
    const target_order = parseInt(event.currentTarget.dataset.order);
    change_current_system(target_order);
    handle_navigation_controls();
}

systems.forEach(el => el.addEventListener('click', show_selected))

btn_next.addEventListener('click', show_next);
btn_prev.addEventListener('click', show_previous);


// Spaceship
function move_the_spaceship(where) {
    const system = navigation.querySelector(`[data-order='${where}']`);
    const spaceship_width = spaceship.getBoundingClientRect().width / 2;
    const new_x = system.getBoundingClientRect().left - system.getBoundingClientRect().width / 2 - spaceship_width;
    spaceship.style.left = `${new_x}px`;
}
