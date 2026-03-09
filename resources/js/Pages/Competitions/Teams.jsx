import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import TeamTable from "../Teams/Components/TeamTable";
import Modal from "@/Components/Modal";
import { useState } from "react";
import TeamRemove from "./Components/TeamRemove";

export default function CompetitionShow({ competition }) {
    const [isRemoveModalOpen, setIsRemoveModalOpen] = useState(false);
    const [selectedTeam, setSelectedTeam] = useState(null);

    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="p-6 text-gray-900">
                    {competition.teams && competition.teams.length > 0 ? (
                        <TeamTable
                            teams={competition.teams}
                            actions={[
                                {
                                    icon: "view",
                                    onClick: (team) => {
                                        // TODO: Implement view team competition details
                                        console.log(
                                            "View team competition details:",
                                            team,
                                        );
                                    },
                                },
                                {
                                    icon: "remove",
                                    onClick: (team) => {
                                        setSelectedTeam(team);
                                        setIsRemoveModalOpen(true);
                                    },
                                },
                            ]}
                        />
                    ) : (
                        <p>No teams in this competition</p>
                    )}
                </div>
            </CompetitionLayout>
            <Modal
                show={isRemoveModalOpen}
                onClose={() => {
                    setSelectedTeam(null);
                    setIsRemoveModalOpen(false);
                }}
            >
                <TeamRemove
                    team={selectedTeam}
                    competition={competition}
                    onCancel={() => {
                        setSelectedTeam(null);
                        setIsRemoveModalOpen(false);
                    }}
                    onSuccess={() => {
                        setSelectedTeam(null);
                        setIsRemoveModalOpen(false);
                    }}
                />
            </Modal>
        </AuthenticatedLayout>
    );
}
