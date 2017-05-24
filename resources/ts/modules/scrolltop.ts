import * as $ from 'jquery';

export class Scroll {
    private base: string;

    public constructor(base: string) {
        this.base = base;

        let win = $(window);
        let body = $('body, html');
        let wrap = $('.scroll-top');
        let button = $('.scroll-top-button');

        win.scroll(() => {
            let y = win.scrollTop();
            if (y > 0) {
                wrap.fadeIn();
            } else {
                wrap.fadeOut();
            }
        });

        button.on('click', () => {
            body.animate({ scrollTop: 0 });
        });
    }
}
