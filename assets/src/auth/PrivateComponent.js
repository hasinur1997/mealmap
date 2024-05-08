const PrivateComponent = ({ children, auth }) => {
    return auth ? children : null;
}

export default PrivateComponent;