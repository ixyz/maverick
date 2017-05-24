import * as $ from 'jquery';
import { Scroll } from './modules/scrolltop';

$(() => {
    let base = $('base').attr('href');
    let scroll = new Scroll(base);
});
