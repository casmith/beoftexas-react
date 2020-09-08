import React, { useState, useEffect } from 'react';
import {
  useParams
} from "react-router-dom";
import ReactMarkdown from 'react-markdown';

function Article() {
  const [error, setError] = useState(null);
  const [isLoaded, setIsLoaded] = useState(false);
  const [article, setArticle] = useState([]);
  const { id } = useParams();

  // Note: the empty deps array [] means
  // this useEffect will run once
  // similar to componentDidMount()
  useEffect(() => {
    fetch(`http://localhost:8080/articles/${id}`)
      .then(res => res.json())
      .then(
        (result) => {
          setIsLoaded(true);
          setArticle(result.data);
        },
        // Note: it's important to handle errors here
        // instead of a catch() block so that we don't swallow
        // exceptions from actual bugs in components.
        (error) => {
          setIsLoaded(true);
          setError(error);
        }
      )
  }, [])

  if (error) {
    return <div>Error: {error.message}</div>;
  } else if (!isLoaded) {
    return <div>Loading...</div>;
  } else {
    return (
        <div>
          <h2>{article.title}</h2>
          <ReactMarkdown>{article.body}</ReactMarkdown>
        </div>
    );
  }
}

export default Article;