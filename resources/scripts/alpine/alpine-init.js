import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';

export default function alpineInit() {
  Alpine.plugin(intersect)
  Alpine.plugin(collapse)
  Alpine.plugin(focus)

  window.Alpine = Alpine

  Alpine.start()
}
