import { typographyOption } from '../../../../static/js/customizer/sync/variables/typography'
import { updateAndSaveEl } from '../../../../static/js/frontend/header/render-loop'
import ctEvents from 'ct-events'
import { responsiveClassesFor } from '../../../../static/js/customizer/sync/helpers'
import {
	getRootSelectorFor,
	assembleSelector,
	mutateSelector,
} from '../../../../static/js/customizer/sync/helpers'

ctEvents.on(
	'ct:header:sync:collect-variable-descriptors',
	(variableDescriptors) => {
		variableDescriptors['logo'] = ({ itemId }) => ({
			logoMaxHeight: {
				selector: assembleSelector(
					mutateSelector({
						selector: getRootSelectorFor({ itemId }),
						operation: 'suffix',
						to_add: '.site-logo-container',
					})
				),
				variable: 'maxHeight',
				responsive: true,
				unit: 'px',
			},

			...typographyOption({
				id: 'siteTitle',
				selector: assembleSelector(
					mutateSelector({
						selector: getRootSelectorFor({ itemId }),
						operation: 'suffix',
						to_add: '.site-title',
					})
				),
			}),

			...typographyOption({
				id: 'siteTagline',
				selector: assembleSelector(
					mutateSelector({
						selector: getRootSelectorFor({ itemId }),
						operation: 'suffix',
						to_add: '.site-description',
					})
				),
			}),

			headerLogoMargin: {
				selector: assembleSelector(getRootSelectorFor({ itemId })),
				type: 'spacing',
				variable: 'margin',
				responsive: true,
				important: true,
			},

			// default state
			siteTitleColor: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'suffix',
							to_add: '.site-title',
						})
					),
					variable: 'linkInitialColor',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'suffix',
							to_add: '.site-title',
						})
					),
					variable: 'linkHoverColor',
					type: 'color:hover',
					responsive: true,
				},
			],

			siteTaglineColor: {
				selector: assembleSelector(
					mutateSelector({
						selector: getRootSelectorFor({ itemId }),
						operation: 'suffix',
						to_add: '.site-description',
					})
				),
				variable: 'color',
				type: 'color:default',
				responsive: true,
			},

			// transparent state
			transparentSiteTitleColor: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.site-title',
							}),
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'linkInitialColor',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.site-title',
							}),
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'linkHoverColor',
					type: 'color:hover',
					responsive: true,
				},
			],

			transparentSiteTaglineColor: {
				selector: assembleSelector(
					mutateSelector({
						selector: mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'suffix',
							to_add: '.site-description',
						}),
						to_add: '[data-transparent-row="yes"]',
					})
				),

				variable: 'color',
				type: 'color:default',
				responsive: true,
			},

			// sticky state
			stickySiteTitleColor: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.site-title',
							}),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'linkInitialColor',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: mutateSelector({
								selector: getRootSelectorFor({ itemId }),
								operation: 'suffix',
								to_add: '.site-title',
							}),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'linkHoverColor',
					type: 'color:hover',
					responsive: true,
				},
			],

			stickySiteTaglineColor: {
				selector: assembleSelector(
					mutateSelector({
						selector: mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'suffix',
							to_add: '.site-description',
						}),
						operation: 'between',
						to_add: '[data-sticky*="yes"]',
					})
				),
				variable: 'color',
				type: 'color:default',
				responsive: true,
			},
		})
	}
)

ctEvents.on('ct:header:sync:item:logo', ({ optionId, optionValue }) => {
	const selector = '[data-id="logo"]'

	if (optionId === 'blogdescription') {
		updateAndSaveEl(selector, (el) => {
			el.querySelector('.site-description') &&
				(el.querySelector('.site-description').innerHTML = optionValue)
		})
	}

	if (optionId === 'blogname_visibility') {
		updateAndSaveEl(selector, (el) => {
			responsiveClassesFor(
				{ ...optionValue },
				el.querySelector('.site-title')
			)
		})
	}

	if (optionId === 'blogdescription_visibility') {
		updateAndSaveEl(selector, (el) => {
			responsiveClassesFor(
				{ ...optionValue },
				el.querySelector('.site-description')
			)
		})
	}

	if (optionId === 'logo_position') {
		updateAndSaveEl(selector, (el) => {
			el.dataset.logo = optionValue
		})
	}
})
