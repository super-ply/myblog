import {
	createElement,
	Component,
	useState,
	useRef,
	useContext
} from '@wordpress/element'
import OutsideClickHandler from './react-outside-click-handler'
import classnames from 'classnames'
import SingleColorPicker from './color-picker/single-picker'
import { __ } from 'ct-i18n'
import { Manager, Reference, Popper } from 'react-popper'
import BoxShadowModal from './box-shadow/box-shadow-modal'

import { ColorPickerContext } from './ct-color-picker'

const clamp = (min, max, value) => Math.max(min, Math.min(max, value))

const BoxShadow = ({ value, option, onChange }) => {
	const [{ isPicking, isTransitioning }, setAnimationState] = useState({
		isPicking: null,
		isTransitioning: null
	})

	const { modalWrapper } = useContext(ColorPickerContext)

	const [focusedComponent, setFocusedComponent] = useState(null)

	const el = useRef()
	const colorPicker = useRef()

	const hOffsetRef = useRef()
	const vOffsetRef = useRef()
	const blurRef = useRef()
	const spreadRef = useRef()

	return (
		<div
			ref={el}
			className={classnames('ct-box-shadow', {
				'ct-disabled': !value.enable
			})}>
			<SingleColorPicker
				innerRef={colorPicker}
				picker={{
					id: 'default',
					title: 'Initial'
				}}
				option={{
					pickers: [
						{
							id: 'default',
							title: 'Initial'
						}
					]
				}}
				isPicking={isPicking}
				isTransitioning={isTransitioning}
				onPickingChange={isPicking => {
					if (!value.enable) {
						return
					}

					setAnimationState({
						isTransitioning: 'default',
						isPicking
					})
				}}
				stopTransitioning={() =>
					setAnimationState({
						isPicking,
						isTransitioning: false
					})
				}
				onChange={colorValue =>
					onChange({
						...value,
						color: colorValue
					})
				}
				value={value.color}
			/>

			<OutsideClickHandler
				useCapture={false}
				disabled={!isPicking}
				className="ct-box-shadow-values"
				additionalRefs={[colorPicker, modalWrapper]}
				onOutsideClick={() => {
					if (!isPicking) {
						return
					}

					setAnimationState({
						isTransitioning: isPicking.split(':')[0],
						isPicking: null
					})
				}}
				wrapperProps={{
					onClick: e => {
						e.preventDefault()

						let futureIsPicking = isPicking
							? isPicking.split(':')[0] === 'opts'
								? null
								: `opts:${isPicking.split(':')[0]}`
							: 'opts'

						setAnimationState({
							isTransitioning: 'opts',
							isPicking: futureIsPicking
						})
					}
				}}>
				<span>
					{value.enable
						? __('Adjust', 'blocksy')
						: __('None', 'blocksy')}
				</span>
			</OutsideClickHandler>

			<BoxShadowModal
				el={el}
				value={value}
				onChange={onChange}
				option={option}
				isPicking={isPicking}
				isTransitioning={isTransitioning}
				hOffsetRef={hOffsetRef}
				vOffsetRef={vOffsetRef}
				blurRef={blurRef}
				spreadRef={spreadRef}
				picker={{
					id: 'opts'
				}}
				onPickingChange={isPicking => {
					if (!value.enable) {
						return
					}

					setAnimationState({
						isTransitioning: 'opts',
						isPicking
					})
				}}
				stopTransitioning={() =>
					setAnimationState({
						isPicking,
						isTransitioning: false
					})
				}
			/>
		</div>
	)
}

BoxShadow.ControlEnd = () => {
	const { modalWrapper } = useContext(ColorPickerContext)

	return <div ref={modalWrapper} className="ct-color-modal-wrapper" />
}

BoxShadow.MetaWrapper = ({ getActualOption }) => {
	const ref = useRef()

	return (
		<ColorPickerContext.Provider
			value={{
				modalWrapper: ref
			}}>
			{getActualOption()}
		</ColorPickerContext.Provider>
	)
}

export default BoxShadow
