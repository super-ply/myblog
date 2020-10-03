import {
	setRatioFor,
	watchOptionsWithPrefix,
	getOptionFor,
	responsiveClassesFor
} from './helpers'
import { getPrefixFor } from './hero-section'

watchOptionsWithPrefix({
	getPrefix: getPrefixFor,

	getOptionsForPrefix: ({ prefix }) => [
		`${prefix}_featured_image_boundless`,
		`${prefix}_featured_image_width`,
		`${prefix}_featured_image_ratio`,
		`${prefix}_featured_image_visibility`,
		`${prefix}_content_style`
	],

	render: ({ prefix, id }) => {
		const image = document.querySelector(
			'.site-main .content-area article .ct-featured-image'
		)

		if (!image) {
			return
		}

		if (id === `${prefix}_featured_image_boundless`) {
			image.classList.remove('ct-boundless')

			if (getOptionFor('featured_image_boundless', prefix) === 'yes') {
				image.classList.add('ct-boundless')
			}
		}

		if (
			id === `${prefix}_featured_image_width` ||
			id === `${prefix}_content_style`
		) {
			image.classList.remove('alignwide')

			if (
				getOptionFor('featured_image_width', prefix) === 'wide' &&
				getOptionFor('content_style', prefix) !== 'boxed'
			) {
				image.classList.add('alignwide')
			}
		}

		if (id === `${prefix}_featured_image_ratio`) {
			setRatioFor(
				getOptionFor('featured_image_ratio', prefix),
				image.querySelector('.ct-image-container .ct-ratio')
			)
		}

		if (id === `${prefix}_featured_image_visibility`) {
			responsiveClassesFor(
				getOptionFor('featured_image_visibility', prefix),
				image
			)
		}
	}
})
