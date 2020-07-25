import React, {useEffect, useState} from 'react';
import api from '../../service/api';

// import { Container } from './styles';

const Course = () => {

    const [ courses, setCourses ] = useState([])
    const [ teste, setTeste] = useState()

    useEffect(() => {
        api.get('courses').then( response => {
            setCourses(response.data)
            console.log(response.data)
            setTeste('teste')
        })
    }, [])
    return (
        <div className="container">
            <h2>Course</h2>
            <ul>
                {/* {courses[0].title} */}
                {courses.map( r => (
                    <li key={r.id}> {r.title}</li>
                ))}
            </ul>
        </div>
    );
}

export default Course;