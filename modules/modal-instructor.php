<?php
/**
 * Instructor profile modal
 *
 * @package sgac
 */

$uri = get_template_directory_uri();

?>
<div id="modal-instructor" class="modal">
	<div class="modal__overlay"></div>
	<div class="modal__content">
		<button class="modal__close" id="modal-close">
			<span class="icon-ico-close-modal"></span>
		</button>
		<button class="gallery-alt-btn gallery-btn__prev">
			<span class="icon-left-open"></span>
		</button>
		<button class="gallery-alt-btn gallery-btn__next">
			<span class="icon-right-open"></span>
		</button>
		<div class="modal-instructor__inner">
			<div class="modal-instructor__picture"></div>
			<div class="modal-instructor__content"></div>
		</div>
		<div class="modal__loader">
			<span class="icon-spin1"></span>
		</div>
	</div>
</div>
