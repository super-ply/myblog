import { typographyOption } from '../../../../static/js/customizer/sync/variables/typography'
import ctEvents from 'ct-events'
import { updateAndSaveEl } from '../../../../static/js/frontend/header/render-loop'
import { responsiveClassesFor } from '../../../../static/js/customizer/sync/helpers'
import {
	getRootSelectorFor,
	assembleSelector,
	mutateSelector,
} from '../../../../static/js/customizer/sync/helpers'

ctEvents.on(
	'ct:header:sync:collect-variable-descriptors',
	(variableDescriptors) => {
		variableDescriptors['text'] = ({ itemId }) => ({
			headerTextMaxWidth: {
				selector: assembleSelector(getRootSelectorFor({ itemId })),
				variable: 'maxWidth',
				responsive: true,
				unit: '%',
			},

			...typographyOption({
				id: 'headerTextFont',

				selector: assembleSelector(getRootSelectorFor({ itemId })),
			}),

			headerTextMargin: {
				selector: assembleSelector(getRootSelectorFor({ itemId })),
				type: 'spacing',
				variable: 'margin',
				responsive: true,
				important: true,
			},

			// default state
			headerTextColor: [
				{
					selector: assembleSelector(getRootSelectorFor({ itemId })),
					variable: 'color',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(getRootSelectorFor({ itemId })),
					variable: 'linkInitialColor',
					type: 'color:link_initial',
					responsive: true,
				},

				{
					selector: assembleSelector(getRootSelectorFor({ itemId })),
					variable: 'linkHoverColor',
					type: 'color:link_hover',
					responsive: true,
				},
			],

			// transparent state
			transparentHeaderTextColor: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'color',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'linkInitialColor',
					type: 'color:link_initial',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-transparent-row="yes"]',
						})
					),

					variable: 'linkHoverColor',
					type: 'color:link_hover',
					responsive: true,
				},
			],

			// sticky state
			stickyHeaderTextColor: [
				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'color',
					type: 'color:default',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'linkInitialColor',
					type: 'color:link_initial',
					responsive: true,
				},

				{
					selector: assembleSelector(
						mutateSelector({
							selector: getRootSelectorFor({ itemId }),
							operation: 'between',
							to_add: '[data-sticky*="yes"]',
						})
					),
					variable: 'linkHoverColor',
					type: 'color:link_hover',
					responsive: true,
				},
			],
		})
	}
)

ctEvents.on('ct:header:sync:item:text', ({ itemId, optionId, optionValue }) => {
	const selector = `[data-id="${itemId}"]`

	if (optionId === 'visibility') {
		updateAndSaveEl(selector, (el) =>
			responsiveClassesFor({ ...optionValue, desktop: true }, el)
		)
	}

	if (optionId === 'header_text') {
		updateAndSaveEl(selector, (el) => {
			el.querySelector('.entry-content').innerHTML = optionValue
		})
	}
})
