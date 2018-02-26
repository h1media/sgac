<script type="text/x-template" id="wcs_templates_modal--normal">
	<div class="wcs-modal wcs-modla-change" :class="modal_classes" v-on:click="closeModal" :data-wcs-modal-id="options.el_id">
		<div class="wcs-modal__box">
			<div class="wcs-modal__inner">
				<a href="#" class="wcs-modal__close ti-close" v-on:click="closeModal"></a>
				<div class="wcs-modal__content">
					<h2><span v-html="data.title"></span>
						<small v-if="filter_var(options.modal_wcs_type) && data.terms.wcs_type">
							<template v-for="(type, index) in data.terms.wcs_type">
								{{type.name}}<template v-if="index !== (data.terms.wcs_type.length - 1)">, </template>
							</template>
						</small>
					</h2>
					<div v-html="data.content"></div>
				</div>
				<div class="wcs-modal__side">
					<img v-if="data.image" :src="data.image" class='wcs-image'>
					<div v-if="data.map" class="wcs-map"></div>
					<ul class="wcs-modal__meta">
						<li><span class="ti-calendar"></span>{{ data.start | moment( options.label_modal_dateformat ? options.label_modal_dateformat : 'MMMM DD @ HH:mm' ) }}</li>
						<li v-if="filter_var(options.show_modal_ending)">
							<span class="ti-time"></span>
							{{ data.start | moment( options.show_time_format ? 'hh' : 'HH' ) }}<span class='wcs-addons--blink'>:</span>{{ data.start | moment('mm') }}
							{{ data.start | moment( options.show_time_format ? 'a' : ' ' ) }}
							-
							{{ data.end | moment( options.show_time_format ? 'hh' : 'HH' ) }}<span class='wcs-addons--blink'>:</span>{{ data.end | moment('mm') }}
							{{ data.end | moment( options.show_time_format ? 'a' : ' ' ) }}
							<span v-if="filter_var(options.show_modal_duration)" class="wcs-modal--muted wcs-addons--pipe">{{data.duration}}</span>
						</li>
						<li v-if="filter_var(options.modal_wcs_room) && data.terms.wcs_room">
							<span class="ti-location-arrow"></span>
							<template v-for="(room, index) in data.terms.wcs_room">
									{{room.name}}<template v-if="index !== (data.terms.wcs_room.length - 1)">, </template>
							</template>
						</li>
						<li v-if="filter_var(options.modal_wcs_instructor) && data.terms.wcs_instructor" class="modal_timetable_instructor">
							<template v-for="(instructor, index) in data.terms.wcs_instructor">
								<span v-if="instructor.thumb" class="instructor-image">
									<img  :src="instructor.thumb" :alt="instructor.name">
								</span>
								<span v-else class="ti-user"></span>
								{{instructor.name}}<template v-if="index !== (data.terms.wcs_instructor.length - 1)">, </template>
							</template>
						</li>
					</ul>
					<div class="wcs-modal__action">
						<template v-for="(button, button_type) in data.buttons">
							<template v-if="button_type == 'main' && button.label.length > 0">
								<a class="wcs-btn wcs-btn--action" v-if="button.method == 0" :href="button.permalink" :target="button.target ? '_blank' : '_self'">{{button.label}}</a>
								<a class="wcs-btn wcs-btn--action" v-else-if="button.method == 1" :href="button.custom_url" :target="button.target ? '_blank' : '_self'">{{button.label}}</a>
								<a class="wcs-btn wcs-btn--action" v-else-if="button.method == 2" :href="button.email" :target="button.target ? '_blank' : '_self'">{{button.label}}</a>
								<a class="wcs-btn wcs-btn--action" v-else-if="button.method == 3" :href="button.ical">{{button.label}}</a>
							</template>
							<template v-else-if="button_type == 'woo'">
								<a :class="button.classes" v-if="button.status" :href="button.href">{{button.label}}</a>
								<a :class="button.classes" v-else-if="!button.status && button.href" :href="button.href">{{button.label}}</a>
								<a :class="button.classes" v-else-if="!button.status" href="#">{{button.label}}</a>
							</template>
						</template>
						<template v-for="(instructor, index) in data.terms.wcs_instructor">
							<a :href="instructor.join_link" class="wcs-btn" target="_blank">{{instructor.join_link_label}}</a>
						</template>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
