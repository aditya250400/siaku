import AppLayout from '@/Layouts/AppLayout';
import { useState } from 'react';

export default function Index(props) {
    const students = props.students;
    const [params, setParams] = useState(props.state);

    return (
        <>
            <div></div>
            <div></div>
            <div>oke</div>
        </>
    );
}

Index.layout = (page) => <AppLayout children={page} title={page.props.page_setting.title} />;
