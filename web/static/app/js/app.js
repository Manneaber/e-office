$(() => {
    const userDropdown = $('a.user#userActionDropdown');
    const dropdownMenu = $('div.dropdown-menu-c#userActionDropdown');

    let dropdownState = false;

    userDropdown.click((e) => {
        e.preventDefault();

        if (dropdownState) {
            dropdownMenu.addClass('hidden');
        } else {
            dropdownMenu.removeClass('hidden');
        }

        dropdownState = !dropdownState;
    });
});
