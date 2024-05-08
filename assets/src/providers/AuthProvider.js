import { AuthContext } from "../context/AuthContext";

const AuthProvider = ({children}) => {
    <AuthContext.Provider
        value={'sdfsdf'}
    >
        {children}
    </AuthContext.Provider>    
}

export default AuthProvider;