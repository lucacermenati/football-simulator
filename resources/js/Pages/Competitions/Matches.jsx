import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import PrimaryButton from "@/Components/PrimaryButton";
import Modal from "@/Components/Modal";
import { useState } from "react";
import CompetitionMatchesForm from "./Components/CompetitionMatchesForm";
import MatchCard from "./Components/MatchCard";
import Pagination from "@/Components/Pagination";

export default function CompetitionMatches({
    competition,
    day,
    matches,
    maxDay,
}) {
    const [isModalOpen, setIsModalOpen] = useState(false);

    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="p-2">
                    <div className="font-semibold text-primaryRed-600">
                        Match day {day} {maxDay && `of ${maxDay}`}
                    </div>
                </div>
                {(matches.length && (
                    <div className="grid grid-cols-2 p-2">
                        {matches.map((match) => (
                            <MatchCard key={match.id} match={match} />
                        ))}
                    </div>
                )) || (
                    <div className="flex justify-center items-center p-16">
                        <PrimaryButton onClick={() => setIsModalOpen(true)}>
                            Generate matches
                        </PrimaryButton>
                    </div>
                )}
                <Pagination
                    links={{
                        prev:
                            day > 1
                                ? route("competitions.matches.index", {
                                      competition: competition.id,
                                      day: parseInt(day) - 1,
                                  })
                                : null,
                        next:
                            day < maxDay
                                ? route("competitions.matches.index", {
                                      competition: competition.id,
                                      day: parseInt(day) + 1,
                                  })
                                : null,
                    }}
                    meta={{
                        links: [],
                    }}
                />
            </CompetitionLayout>
            <Modal show={isModalOpen} onClose={() => setIsModalOpen(false)}>
                <CompetitionMatchesForm
                    competition={competition}
                    onCancel={() => setIsModalOpen(false)}
                    onSuccess={() => setIsModalOpen(false)}
                />
            </Modal>
        </AuthenticatedLayout>
    );
}
