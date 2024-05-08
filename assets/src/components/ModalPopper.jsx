import Modal from "react-responsive-modal";

const ModalPopper = ({ openModal, closeModal, title, content }) => {
    return (
        <>
            <Modal
                open={openModal}
                onClose={closeModal}
                classNames={{modal: 'rounded-md w-80 md:w-256'}}
                center
            >
                <h1 className={'text-xl font-semibold'}>{title}</h1>
                <hr className={'mt-4 mx-4'} />
                <div>{content}</div>
            </Modal>
        </>
    );
}

export default ModalPopper;